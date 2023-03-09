#!/bin/sh
echo `uname -n`
df -h | grep " /scratch"
