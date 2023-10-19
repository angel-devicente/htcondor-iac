import re
import sys

# Get the parameter name and new value from command-line arguments
parameter_name = sys.argv[1]
new_value = sys.argv[2]

# Define the path to your parameter file
file_path = "parameters.ini"  # Replace with your file path

# Read the file content
with open(file_path, 'r') as file:
    file_content = file.read()

# Define a regular expression pattern to match the parameter line
pattern = rf'({parameter_name}\s*=\s*)([\d.+-eE]+)'

# Use re.sub to replace the value, using non-capturing groups (?:)
new_file_content = re.sub(pattern, r'\g<1>' + new_value, file_content)

# Write the updated content back to the file
with open(file_path, 'w') as file:
    file.write(new_file_content)

# Prints some output (to see something in the *.out file)
print(f"Value of {parameter_name} changed to {new_value}")
