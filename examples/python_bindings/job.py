import sys
import os

# Get command-line arguments
job_number = sys.argv[1]
parameter_name = sys.argv[2]
value = sys.argv[3]

# Define input and output files
file_in  = "parameters.ini"
output_dir = "results/results"+str(job_number)
if not os.path.exists(output_dir):
    os.makedirs(output_dir)
file_out = output_dir+"/parameters.out"

# Read input file
with open(file_in, 'r') as f:
    file_content = f.read()

# Write output file (adding line)
with open(file_out, 'w') as f:
    f.write(file_content)
    f.write(f"{parameter_name} = {value}")
    
# Prints some output (will go to *.out file)
print(f"Done adding {parameter_name} : {value}")
