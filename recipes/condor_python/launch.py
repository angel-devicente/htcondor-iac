import os
import htcondor

# Define the parameters and values for the jobs (3 in this example)
job_parameters = [
    {"keyword": "initial_gas_density", "value": "0.400E+06"},
    {"keyword": "initial_gas_density", "value": "1.460E+06"},
    {"keyword": "initial_gas_density", "value": "3.200E+06"},
]

# Directory for results (replace by your own path)
results_dir = '/scratch/<user>/results/'

# Create an HTCondor submit object
submit_description = htcondor.Submit()

# Define the HTCondor executable and other job attributes
submit_description['universe'] = 'vanilla'
submit_description['executable'] = 'python3'  # Path to Python3
submit_description['arguments'] = 'simple_update.py $(parameter) $(value)'
# Choose only Ubuntu22 (otherwise no python/3.10!)
submit_description['requirements']   = 'OpSysAndVer == "Ubuntu22"'
# Pre-commands: Launch module load python/3.10 (available on Ubuntu 22.04 machines)
submit_description['+PreCmd'] = 'pre_cmd.sh'
# Results will be transfered back to these directories
submit_description['initialdir'] = '$(results_dir)'
# Needed files: comma separated absolute values (otherwise relative to initialdir if set)
submit_description['transfer_input_files'] = '/scratch/<user>/simple_update.py, /scratch/<user>/parameters.ini'
# If initialdir is set (which is) uncomment will create a output/error/log for each job under each directory
#submit_description['output'] = '$(Cluster).$(Process).out'
#submit_description['error'] = '$(Cluster).$(Process).err'
#submit_description['log'] = '$(Cluster).log'
# - instead of the above, merge output/error/log for all Processes, so absolute routes on sender system
submit_description['output'] = '/scratch/<user>/results/$(Cluster).$(Process).out'
submit_description['error'] = '/scratch/<user>/results/$(Cluster).$(Process).err'
submit_description['log'] = '/scratch/<user>/results/$(Cluster).log'
submit_description['should_transfer_files'] = 'YES'
submit_description['when_to_transfer_output'] = 'ON_EXIT'


# Iterate through job_parameters and add them to the itemdata
itemdata = []
for i, params in enumerate(job_parameters):
    output_dir = results_dir+str(i)
    itemdata.append({'parameter': params['keyword'], 'value': params['value'], 'results_dir': output_dir})
    # Create the directories if they don't exist (they must exist before submitting!)
    if not os.path.exists(output_dir):
        os.makedirs(output_dir)

# Submit the jobs using the itemdata
schedd = htcondor.Schedd()
submit_result = schedd.submit(submit_description, itemdata = iter(itemdata))

# Notify of the HTCondor job
print(f"Jobs submitted with Cluster ID: {submit_result.cluster()}")
