import numpy as np
from rules2 import rules2
import copy
import random
import time

class algenVnp():
    def __init__(self,nn_params:dict,population:int,generation:int,cr=0.7,mr=0.5):
        """
        nn_params contains subjects and room_time
        :param nn_params:
        :param population:
        :param generation:
        :param cr:
        :param mr:
        """
        self.nn_params = nn_params
        self.population_num = population
        self.generation_num = generation
        self.crossover_rate = cr
        self.mutation_rate = mr
        self.cromosom_len = len(self.nn_params['subjects'])
        self.gene_var_len = len(self.nn_params['room_times'])

    def create_population(self):
        population = []
        for pop in range(self.population_num):
            cromosom = []
            # create cromosom
            room_times = random.sample(self.nn_params['room_times'],self.cromosom_len)
            for index,subject in enumerate(self.nn_params['subjects']):
                gene = {}
                gene['subject'] = subject
                gene['room_time'] = room_times[index]
                cromosom.append(gene)
            population.append(cromosom)
        return population

    def selection(self,pop):
        # selection with roulette wheels
        fit_res = []
        for p in pop:
            rl = rules2(p)
            result = rl.calculate()
            fit_res.append(result)
        fit_sum = sum(fit_res)

        # fit probability
        fit_prob = []
        for i,fr in enumerate(fit_res):
            fp = fr/fit_sum
            fit_prob.append(fp)

        # fit prob distribution
        prob_dist = []
        for i,fp in enumerate(fit_prob,1):
            pbd = sum(fit_prob[:i])
            prob_dist.append(pbd)

        # generate number 0-1
        selection = []
        for i,pb in enumerate(prob_dist):
            rn = random.random()
            for ix,pbx in enumerate(prob_dist):
                if rn <= pbx:
                    selection.append(ix)
                    break
        selected = []
        for i, select in enumerate(selection):
            rn = random.random()
            if rn <= self.crossover_rate:
                selected.append(select)
        selected_pop = np.array(pop)[selected].tolist()
        return selected_pop


    def single_point_crossover(self,male,female):
        """
        create random number,pick male gene smaller than random number
        then pick female gene greater than random number

        :param male:
        :param female:
        :return: child
        """
        child = []
        rn = random.randint(0,len(male)-1)
        child.append(male[:rn]+female[rn:])
        child.append(female[:rn]+male[rn:])
        return child

    def multi_point_crossover(self,male,female):
        """
        create random number,pick male gene smaller than random number
        then pick female gene greater than random number

        :param male:
        :param female:
        :return: child
        """
        child = []
        rn = []
        for _ in range(2):
            rn.append(random.randint(0,len(male)-1))
        rn = sorted(rn)
        child.append(male[:rn[0]] + female[rn[0]:rn[1]] + male[rn[1]:])
        child.append(female[:rn[0]] + male[rn[0]:rn[1]] + female[rn[1]:])
        return child

    def crossover(self,male,female):
        return self.multi_point_crossover(male,female)

    def evolve(self,population):
        parent = self.selection(population)
        parent_len = len(parent)
        desired_len = self.population_num - parent_len
        # breeding
        child = []
        while len(child) < desired_len:

            while True:
                male = random.randint(0,parent_len-1)
                female = random.randint(0,parent_len-1)
                if male != female:
                    break
            male = parent[male]
            female = parent[female]
            babies = self.crossover(male,female)
            for baby in babies:
                if len(child) < self.population_num:
                    child.append(baby)
        start_time = time.time()
        # mutate child
        for i,individu in enumerate(child):
            if self.mutation_rate > random.random():
                child[i] = self.mutation(individu)
        print(time.time()-start_time)
        parent = parent+child

        return parent

    def scramble_mutation(self,individu):
        # random selected mutation
        gene_range = []
        room_times = map(lambda x: x['room_time'],individu)
        room_times = list(room_times)

        for _ in range(2):
            gene_range.append(random.randint(0,len(individu)))
        gene_range = sorted(gene_range)
        scrambled_gene = room_times[gene_range[0]:gene_range[1]]
        random.shuffle(scrambled_gene)
        room_times = room_times[:gene_range[0]] + scrambled_gene + room_times[gene_range[1]:]
        for index,ind in enumerate(individu):
            individu[index]['room_time'] = room_times[index]
        return individu
    def select_random_mutation(self,individu):
        # random selected mutation
        room_times = map(lambda x: x['room_time'],individu)
        room_times = list(room_times)
        chromosom_validate = copy.deepcopy(individu)
        for index,ind in enumerate(individu):
            if random.random() > random.random():
                choice = random.choice(self.nn_params['room_times'])
                choice_past = []
                while True:
                    while choice in room_times:
                        choice = random.choice(self.nn_params['room_times'])
                    room_times[index] = choice
                    chromosom_validate[index]['room_time'] = choice
                    rl1 = rules2(individu)
                    rl2 = rules2(chromosom_validate)
                    result1 = rl1.calculate()
                    result2 = rl2.calculate()
                    if  result1 > result2:
                        choice_past.append(choice)
                    else:
                        individu = copy.deepcopy(chromosom_validate)
                        break
        return individu

    def mutation(self,individu):
        individu_new = self.select_random_mutation(individu)
        return individu_new
