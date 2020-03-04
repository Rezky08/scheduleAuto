import pandas as pd
import numpy as np

class rules2():
    def __init__(self,cromosom):
        self.cromosom = cromosom
        self.room_times = map(lambda x:x['room_time'],self.cromosom)
        self.room_times = list(self.room_times)
        self.subjects = map(lambda x: x['subject'], self.cromosom)
        self.subjects = list(self.subjects)
        self.clash = 0
        self.sks_clash = 0
    def sks(self):

        for index,subject in enumerate(self.cromosom):
            check_room_time = subject['room_time']
            check_room_time = list(check_room_time)
            for _ in range(subject['subject']['sks']-1):
                check_room_time[2]+=1
                if tuple(check_room_time) in self.room_times:
                    self.sks_clash+=1
        return self.sks_clash



    def clash_time_check(self):
        """
        search same rooms at same day, times
        :return:
        """
        gene_unique,gene_index,gene_unique_count = np.unique(self.room_times,return_counts=True,return_index=True,axis=0)
        try:
            self.clash = len(np.where(gene_unique_count>1)[0])
        except:
            pass

    def calculate(self):
        """
        rules
            clash schedule : 1
        formula
        1 / (sum(clash schedule) * rules) + ... +
        :return:
        """
        self.sks()
        self.clash_time_check()
        fitness = 1 / (1+(self.clash*1)+(self.sks_clash*1))
        return fitness

    def chromosom_check(self):
        self.sks()
        self.clash_time_check()
        return [self.clash,self.sks_clash]