#!/bin/bash

# Prepare the environment
export USER=<username>
export PATH=$PATH
source /usr/local/glob/SIE/.bashrc_SIE

module load python/3.10  # load modules

python3 "$@"             # launch job 
