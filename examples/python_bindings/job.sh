#!/bin/bash

# Prepare the environment 
source /usr/local/glob/SIE/.bashrc_SIE
export USER=<username>

module load python/3.10  # load modules

python3 "$@"             # launch job 
