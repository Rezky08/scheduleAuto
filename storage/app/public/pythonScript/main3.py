import pandas as pd
import numpy as np
import random
from algenVnp import algenVnp
from params import params
from rules2 import rules2
import sys
import yaml
import json

jadwal = pd.read_csv('D:/KULIAH/KKP/jadwal.csv')

# subjects
subjects = jadwal.loc[:,['Kode','Kelp','Sks','Nama Dosen']]
subjects = pd.DataFrame(subjects.values,columns=['kode','kelp','sks','nama_dosen'])
subjects = subjects.to_dict(orient="record")
subjects_number = [i for i,x in enumerate(subjects,1)]

# rooms
rooms = np.unique(jadwal['Ruang'].values)
rooms = filter(lambda x:x.find("LAB"),rooms)
rooms = list(rooms)
rooms_number = [i for i,x in enumerate(rooms,1)]

# days
days = ['senin','selasa','rabu','kamis','jumat']
days_number = [i for i,x in enumerate(days,1)]

# times
param = params()
from_time = "07:10:00"
to_time = "18:00:00"
study_time = 50
delta_time = 5
times = param.create_time(from_time=from_time,to_time=to_time,study_time=study_time,delta_time=delta_time)
times_number = [i for i,x in enumerate(times,1)]

# params
generation = 100
population = 6
cr = 0.7
mr = 0.5

nn_params = {
    'subjects' : subjects_number,
    'rooms' : rooms_number,
    'days' : days_number,
    'times' : times_number
}
simple_params = []

for room in nn_params['rooms']:
    for day in nn_params['days']:
        for time in nn_params['times']:
            simple_params.append((room,day,time))
simple_params_num = [i for i,x in enumerate(simple_params,1)]

nn_simple_params = {
    'subjects' : subjects,
    'room_times' : simple_params
}
print(np.asarray(nn_simple_params['subjects']))
print(np.asarray(nn_simple_params['room_times']))
print(np.asarray(times))

schedule_ag = algenVnp(nn_simple_params,population=population,generation=generation)
pop = schedule_ag.create_population()
fit_max = []
pop_max = []
for g in range(1,generation+1):
    print("GENERATION {}".format(g))
    # fit pop
    fit_pop = []
    for p in pop:
        rl = rules2(p)
        fit_pop.append(rl.calculate())
    if max(fit_pop) == 1:
        pop_max.append(pop[np.argmax(fit_pop)])
    if len(pop_max) >=3 :
        break
    print(fit_pop)
    fit_max.append(max(fit_pop))
    pop = schedule_ag.evolve(population=pop)

print(fit_max)

schedule = pop[np.argmax(fit_pop)]
schedule_export = []
for index,schedule in enumerate(schedule):
    schedule_subject = {}
    schedule_room_time = {}
    room_time = schedule['room_time']
    room_time = list(room_time)
    schedule_room_time['room'] = rooms[room_time[0]-1]
    schedule_room_time['day'] = days[room_time[1]-1]
    schedule_room_time['time'] = times[room_time[2]-1]
    schedule_subject.update(schedule['subject'])
    schedule_subject.update(schedule_room_time)
    schedule_export.append(schedule_subject)
schedule_export = pd.DataFrame(schedule_export)
schedule_export.to_csv("schedule_export.csv")
