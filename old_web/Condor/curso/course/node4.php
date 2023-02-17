<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Hands-on session with Condor: Workbook  - Basic Job Submission"; ?>
<?php $metadescription="Hands-on session with Condor: Workbook  - Basic Job Submission"; ?>

<?php include("header_course.php"); ?>


<!--Navigation Panel-->
<a name="tex2html162"  href="node5.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png" /></a> 
<a name="tex2html158"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png" /></a> 
<a name="tex2html152"  href="node3.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png" /></a> 
<a name="tex2html160"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png" /></a>  

<br />

<strong> Next:</strong> <a name="tex2html163"  href="node5.php">Managing jobs</a>
<strong> Up:</strong> <a name="tex2html159"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html153"  href="node3.php">Introduction</a>
 &nbsp; 
<strong>  <a name="tex2html161"  href="node1.php">Contents</a></strong> 
<br />
<br />
<!--End of Navigation Panel-->

<!--Table of Child-Links-->
<a name="CHILD_LINKS"><strong>Subsections</strong></a>

<ul>
<li><a name="tex2html164"  href="node4.php#SECTION00041000000000000000">Before we start: road-map for running jobs</a>
<li><a name="tex2html165"  href="node4.php#SECTION00042000000000000000">The simplest job.</a>
<ul>
<li><a name="tex2html166"  href="node4.php#SECTION00042100000000000000">Example</a>
<ul>
<li><a name="tex2html167"  href="node4.php#SECTION00042110000000000000">Submission file</a>
<li><a name="tex2html168"  href="node4.php#SECTION00042120000000000000">Running example</a>
<li><a name="tex2html169"  href="node4.php#SECTION00042130000000000000">Mail from Condor system.</a>
</ul>
<li><a name="tex2html170"  href="node4.php#SECTION00042200000000000000">Exercise</a>
</ul>
<br />
<li><a name="tex2html171"  href="node4.php#SECTION00043000000000000000">Did you get any errors?</a>
<ul>
<li><a name="tex2html172"  href="node4.php#SECTION00043100000000000000">Example</a>
<ul>
<li><a name="tex2html173"  href="node4.php#SECTION00043110000000000000">Submission file</a>
<li><a name="tex2html174"  href="node4.php#SECTION00043120000000000000">Running the code.</a>
</ul>
<li><a name="tex2html175"  href="node4.php#SECTION00043200000000000000">Example</a>
<ul>
<li><a name="tex2html176"  href="node4.php#SECTION00043210000000000000">Submission file</a>
<li><a name="tex2html177"  href="node4.php#SECTION00043220000000000000">Running the code.</a>
</ul>
</ul>

<br />

<li><a name="tex2html178"  href="node4.php#SECTION00044000000000000000">Initialdir to the rescue...</a>
<ul>
<li><a name="tex2html179"  href="node4.php#SECTION00044100000000000000">Example</a>
<ul>
<li><a name="tex2html180"  href="node4.php#SECTION00044110000000000000">Submission file</a>
<li><a name="tex2html181"  href="node4.php#SECTION00044120000000000000">Running the code</a>
</ul>
</ul>

<br />

<li><a name="tex2html182"  href="node4.php#SECTION00045000000000000000">Now, let's get our hands dirty...
</a>
<ul>
<li><a name="tex2html183"  href="node4.php#SECTION00045100000000000000">Example</a>
<ul>
<li><a name="tex2html184"  href="node4.php#SECTION00045110000000000000">Submission file</a>
<li><a name="tex2html185"  href="node4.php#SECTION00045120000000000000">Running the code</a>
</ul>
<li><a name="tex2html186"  href="node4.php#SECTION00045200000000000000">Exercise</a>
</ul>
</ul>
<!--End of Table of Child-Links-->

<hr />

<h1 ><a name="SECTION00040000000000000000">Basic job submission</a></h1>



<h2><a name="SECTION00041000000000000000">Before we start: road-map for running jobs</a></h2>

<p>
The road to using Condor effectively is a short one. The basics are quickly and
easily learned. Here are the four steps needed to run a job using Condor:
</p>


<ol>
<li><strong>Prepare your code.</strong>
    A job run under Condor must be able to run as a background batch job. Condor
runs the program unattended and in the background. A program that runs in the
background will not be able to do interactive input and output. Condor can
redirect console output (stdout and stderr) and keyboard input (stdin) to and
from files for you. Create any needed files that contain the proper keystrokes
needed for program input. Make certain the program will run correctly with the
files. <br /><br />
</li>

<li><strong>Choose a Condor Universe.</strong>
 Condor has several runtime environments (called a universe) from which to
 choose. For the moment we will start with the less restrictive one, the vanilla
 universe, and we'll worry about the other universes later on.   <br />   <br />
</li>

<li><strong>Write the submit description file.</strong>  
Controlling the details of a job submission is a submit description file. The
file contains information about the job such as what executable to run, the
files to use for keyboard and screen data, the platform type required to run the
program, and where to send e-mail when the job completes. You can also tell
Condor how many times to run a program; it is simple to run the same program
multiple times with multiple data sets.
  <br />
  <br />
</li>
<li><strong>Submit the Job.</strong>
Submit the program to Condor with the condor_submit command. Once submitted,
Condor does the rest toward running the job. Monitor the job's progress with the
condor_q and condor_status commands. You may modify the order in which Condor
will run your jobs with condor_prio. If desired, Condor can even inform you in
a log file every time your job is checkpointed and/or migrated to a different
machine.</li>
</ol>

<p>
When your program completes, Condor will tell you (by e-mail, if preferred) the
exit status of your program and various statistics about its performances,
including time used and I/O performed. If you are using a log file for the
job (which is recommended) the exit status will be recorded in the log file. You
can remove a job from the queue prematurely with condor_rm.</p>

<p>
Let's try it out...
</p>



<h2><a name="SECTION00042000000000000000">The simplest job.</a></h2>

<p>
<em>In order to follow the examples and exercises, make sure you have
  created the following directories in your machine:</em>
</p>

<ul>

<li>/home/username/Condor-Course</li> 
<li>/scratch/Condor-Course</li>
</ul>
with the former being a symlink to the latter.

<p>
<em>The code for all the examples and the exercises in this workbook are
  available from the IAC Condor page at
  <a name="tex2html6"
  href="http://research.iac.es/sieinvens/SINFIN/Condor/">http://research.iac.es/sieinvens/SINFIN/Condor/</a>,
and you should copy them to Condor-Course in your home directory.</em>
</p>


<h3><a name="SECTION00042100000000000000">Example</a></h3>



<h4><a name="SECTION00042110000000000000">Submission file</a></h4>


<pre>
########################################################
##
## Example 1
##
## Simple condor job description file
##
########################################################

executable = /bin/uname
universe = vanilla
output = example1.out
error =  example1.err
log =    example1.log
queue
</pre>


<p></p>

<h4><a name="SECTION00042120000000000000">Running example</a></h4>


<pre>
[angelv@guinda ~/Condor-Course]$ condor_submit example1.submit 
Submitting job(s).
Logging submit event(s).
1 job(s) submitted to cluster 172.


[angelv@guinda ~/Condor-Course]$ condor_q
-- Submitter: guinda.iac.es : &lt;161.72.81.187:32795&gt; : guinda.iac.es
 ID      OWNER            SUBMITTED     RUN_TIME ST PRI SIZE CMD               
 172.0   angelv          9/22 16:41   0+00:00:01 R  0   0.0  uname             

1 jobs; 0 idle, 1 running, 0 held


[angelv@guinda ~/Condor-Course]$ condor_q
-- Submitter: guinda.iac.es : &lt;161.72.81.187:32795&gt; : guinda.iac.es
 ID      OWNER            SUBMITTED     RUN_TIME ST PRI SIZE CMD               

0 jobs; 0 idle, 0 running, 0 held


[angelv@guinda ~/Condor-Course]$ cat example1.out 
Linux


[angelv@guinda ~/Condor-Course]$ cat example1.err


[angelv@guinda ~/Condor-Course]$ cat example1.log 
000 (172.000.000) 09/22 16:41:08 Job submitted from host: &lt;161.72.81.187:32795&gt;
...
001 (172.000.000) 09/22 16:41:14 Job executing on host: &lt;161.72.80.28:56778&gt;
...
005 (172.000.000) 09/22 16:41:14 Job terminated.
      (1) Normal termination (return value 0)
      Usr 0 00:00:00, Sys 0 00:00:00  -  Run Remote Usage
      Usr 0 00:00:00, Sys 0 00:00:00  -  Run Local Usage
      Usr 0 00:00:00, Sys 0 00:00:00  -  Total Remote Usage
      Usr 0 00:00:00, Sys 0 00:00:00  -  Total Local Usage
      0  -  Run Bytes Sent By Job
      0  -  Run Bytes Received By Job
      0  -  Total Bytes Sent By Job
      0  -  Total Bytes Received By Job
...

[angelv@guinda ~/Condor-Course]$ host 161.72.80.28
28.80.72.161.in-addr.arpa domain name pointer canistel.ll.iac.es.
</pre>



<h4><a name="SECTION00042130000000000000">Mail from Condor system.</a></h4> 

<p>Unless you specify not to, you will receive an e-mail from Condor when each of
your jobs completes or has any errors.</p>


<pre>
From: condor@iac.es (Condor Administrator)
To: angelv@iac.es
Subject: [Condor] Condor Job 172.0
Date: Wed, 22 Sep 2004 16:41:14 +0100 (WEST)

This is an automated email from the Condor system
on machine "guinda.iac.es".  Do not reply.

Your Condor job 172.0 
/bin/uname 
has exited normally with status 0.


Submitted at:        Wed Sep 22 16:41:08 2004
Completed at:        Wed Sep 22 16:41:14 2004
Real Time:           0 00:00:06

Virtual Image Size:  12 Kilobytes

Statistics from last run:
Allocation/Run time:     0 00:00:02
Remote User CPU Time:    0 00:00:00
Remote System CPU Time:  0 00:00:00
Total Remote CPU Time:   0 00:00:00

Statistics totaled from all runs:
Allocation/Run time:     0 00:00:02

Network:
    0.0 B  Run Bytes Received By Job
    0.0 B  Run Bytes Sent By Job


-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
Questions about this message or Condor in general?
Email address of the local Condor administrator: condor@iac.es
The Official Condor Homepage is http://www.cs.wisc.edu/condor
</pre>



<h3><a name="SECTION00042200000000000000"></a><a name="ex_disk_info"></a>Exercise</h3>

<p>
Modify the example above, so that the executable instead of being a system
command will be a program written by you called disk_info.sh. 
</p>

<p>
Write the code for disk_info.sh. This is a basic shell script that using the
commands uname, df, and grep will find the available scratch space. 
</p>

<p>
Submit the job to Condor. The output should be similar to:
</p>


<pre>
[angelv@guinda Exercises]$ cat exercise1.out
bicuda
/dev/hda3              70G   43G   24G  65% /scratch
/dev/hdb1             126G   54G   67G  45% /scratch1
[angelv@guinda Exercises]$
</pre>


<h2><a name="SECTION00043000000000000000">Did you get any errors?</a></h2>

<p>
Congratulations if you got the previous exercise without errors, but it is
likely that the first times you submit jobs to Condor you will get into
trouble. A common error is problems accesing your code or data files. Below
there are two examples.
</p>


<h3><a name="SECTION00043100000000000000">Example</a></h3>



<h4><a name="SECTION00043110000000000000">Submission file</a></h4>

<pre>
########################################################
##
## Example 2
##
## Simple condor job description file (with errors)
##
########################################################

executable = uname
universe = vanilla
output = example2.out
error =  example2.err
log =    example2.log
queue
</pre>

<p></p>

<h4><a name="SECTION00043120000000000000">Running the code.</a></h4>

<p>
In this case, Condor will complain right away...
</p>


<pre>
[angelv@guinda ~/Condor-Course]$ condor_submit example2.submit
Submitting job(s)
ERROR: failed to transfer executable file uname
</pre>



<h3><a name="SECTION00043200000000000000">Example</a></h3>



<h4><a name="SECTION00043210000000000000">Submission file</a></h4>

<pre>
########################################################
##
## Example 3
##
## Simple condor job description file (with errors)
##
########################################################

executable = /bin/uname
universe = vanilla
output = /scratch/angelv/Condor-Course/example3.out
error =  /scratch/angelv/Condor-Course/example3.err
log =    example3.log
queue
</pre>

<p></p>

<h4><a name="SECTION00043220000000000000">Running the code.</a></h4>

<p>
This case is more subtle. It will look like your job is put in the queue, it
will run for a while, and then it will be put in the idle state, and then back
to the running state, and so on...In these cases the log file is your best
friend. 
</p>


<pre>
[angelv@guinda ~/Condor-Course]$ ls -l /scratch/angelv/
total 16
drwxr-xr-x   14 angelv   games        4096 sep 16 14:39 Audio
drwxr-xr-x    2 angelv   games        4096 sep 22 16:50 Condor-Course
drwxr-xr-x    4 angelv   games        4096 dic 19  2003 Documentation
drwxrwxr-x   15 angelv   games        4096 sep  7 14:29 Work


[angelv@guinda ~/Condor-Course]$ condor_submit example3.submit
Submitting job(s).
Logging submit event(s).
1 job(s) submitted to cluster 174.

[angelv@guinda ~/Condor-Course]$ ls /scratch/angelv/Condor-Course/
example3.err  example3.out


[angelv@guinda ~/Condor-Course]$ cat /scratch/angelv/Condor-Course/example3.err 


[angelv@guinda ~/Condor-Course]$ cat /scratch/angelv/Condor-Course/example3.out


[angelv@guinda ~/Condor-Course]$ cat example3.log 
000 (174.000.000) 09/22 16:50:59 Job submitted from host: &lt;161.72.81.187:32795&gt;
...
007 (174.000.000) 09/22 16:51:19 Shadow exception!
        Error from starter on canistel.iac.es: Failed to open standard output file 
  '/scratch/angelv/Condor-Course/example3.out': No such file or directory (errno 2)
        0  -  Run Bytes Sent By Job
        0  -  Run Bytes Received By Job
...
007 (174.000.000) 09/22 16:51:21 Shadow exception!
        Error from starter on canistel.iac.es: Failed to open standard output file 
  '/scratch/angelv/Condor-Course/example3.out': No such file or directory (errno 2)
        0  -  Run Bytes Sent By Job
        0  -  Run Bytes Received By Job
...
007 (174.000.000) 09/22 16:51:23 Shadow exception!
        Error from starter on canistel.iac.es: Failed to open standard output file 
  '/scratch/angelv/Condor-Course/example3.out': No such file or directory (errno 2)
        0  -  Run Bytes Sent By Job
        0  -  Run Bytes Received By Job
...
</pre>



<h2><a name="SECTION00044000000000000000">Initialdir to the rescue...</a></h2>



<h3><a name="SECTION00044100000000000000">Example</a></h3>


<h4><a name="SECTION00044110000000000000">Submission file</a></h4>

<pre>
########################################################
##
## Example 4
##
## Using Initialdir
##
########################################################

executable = /bin/uname
universe = vanilla

Initialdir = /net/guinda/scratch/angelv/Condor-Course/
output = example4.out
error =  example4.err
log =    example4.log
queue
</pre>



<h4><a name="SECTION00044120000000000000">Running the code</a></h4>

<pre>
[angelv@guinda ~/Condor-Course]$ condor_submit example4.submit
Submitting job(s).
Logging submit event(s).
1 job(s) submitted to cluster 181.

[angelv@guinda ~/Condor-Course]$ ls /scratch/angelv/Condor-Course/
example4.err  example4.log  example4.out

[angelv@guinda ~/Condor-Course]$ cat /scratch/angelv/Condor-Course/example4.out
Linux
[angelv@guinda ~/Condor-Course]$
</pre>



<h2><a name="SECTION00045000000000000000">Now, let's get our hands dirty...</a></h2>

<p>
Until now, we have only seen toy submission files! Let's see a much more
powerful example.
</p>



<h3><a name="SECTION00045100000000000000">Example</a></h3>

<h4><a name="SECTION00045110000000000000">Submission file</a></h4>

<pre>
########################################################
##
## Example 5
##
## A realistic submission file
##
########################################################

executable = mycode.$$(OpSys)
universe = vanilla
Requirements = Memory &gt;= 1000 &amp;&amp; ((Arch == "INTEL" &amp;&amp; OpSys == "LINUX") || \ 
                                  (Arch == "SUN4u" &amp;&amp; OpSys == "SOLARIS29"))
Rank = Memory


Initialdir = /net/guinda/scratch/angelv/Condor-Course/
arguments = $(Process)
output = example5.$(Process).out
error =  example5.$(Process).err
log =    example5.log
queue 20

------------------------------------------------------------------

#!/usr/bin/tcsh

# mycode.SOLARIS29

echo I yawn, therefore I will be sleeping $argv[1] seconds ...
sleep $argv[1]
echo This amazing program was run in `uname -n`, a `uname -m` on `date`

-------------------------------------------------------------------

#!/bin/tcsh

## mycode.LINUX

echo The argument you passed me is $argv[1], so I will be sleeping $argv[1] seconds ...
sleep $argv[1]
echo This amazing program was run in `uname -n`, a `uname -m` on `date`
</pre>

<p></p>

<h4><a name="SECTION00045120000000000000">Running the code</a></h4>

<pre>
[angelv@guinda ~/Condor-Course]$ condor_status -constraint 'Memory &gt;= 1000' \ 
-sort Memory -format "%s " Machine -format "%d \n"  Memory

codorniz.iac.es 1005
sandia.iac.es 1005
correhuela.iac.es 1005
hinojo.iac.es 1005
tiburon.iac.es 1005
durazno.iac.es 1005
ortiga.iac.es 1005
sargo.iac.es 1005
praca.iac.es 1005
melocoton.iac.es 1005
odiseo.iac.es 1005
botero.iac.es 1006
botero.iac.es 1006
camelia.iac.es 1006
camelia.iac.es 1006
faya.iac.es 1024
rex.iac.es 1024
rex.iac.es 1024
rex.iac.es 1024
rex.iac.es 1024
peje.iac.es 1024
cebra.iac.es 1024
choco.iac.es 1152
coco.iac.es 1510
rambutan.iac.es 1510
rambutan.iac.es 1510
tuno.iac.es 1510
agrimonia.iac.es 1826
agrimonia.iac.es 1826
orca.iac.es 2015
cobos.iac.es 2015
bicuda.iac.es 2015
trueno.iac.es 2015
[angelv@guinda ~/Condor-Course]$

[angelv@guinda ~/Condor-Course]$ condor_submit example5.submit
Submitting job(s)....................
Logging submit event(s)....................
20 job(s) submitted to cluster 183.
[angelv@guinda ~/Condor-Course]$

--------------------------------------------------------------

[angelv@guinda Condor-Course]$ pwd
/scratch/angelv/Condor-Course

[angelv@guinda Condor-Course]$ cat example5*out
The argument you passed me is 0, so I will be sleeping 0 seconds ...
This amazing program was run in cobos, a i686 on Wed Sep 29 15:23:28 WEST 2004
The argument you passed me is 10, so I will be sleeping 10 seconds ...
This amazing program was run in camelia, a i686 on Wed Sep 29 15:23:59 WEST 2004
The argument you passed me is 11, so I will be sleeping 11 seconds ...
This amazing program was run in camelia, a i686 on Wed Sep 29 15:24:03 WEST 2004
The argument you passed me is 12, so I will be sleeping 12 seconds ...
This amazing program was run in codorniz, a i686 on Wed Sep 29 15:24:00 WEST 2004
The argument you passed me is 13, so I will be sleeping 13 seconds ...
This amazing program was run in odiseo, a i686 on Wed Sep 29 15:24:06 WEST 2004
The argument you passed me is 14, so I will be sleeping 14 seconds ...
This amazing program was run in hinojo, a i686 on Wed Sep 29 15:24:09 WEST 2004
The argument you passed me is 15, so I will be sleeping 15 seconds ...
This amazing program was run in cobos, a i686 on Wed Sep 29 15:24:13 WEST 2004
The argument you passed me is 16, so I will be sleeping 16 seconds ...
This amazing program was run in trueno, a i686 on Wed Sep 29 15:24:15 WEST 2004
The argument you passed me is 17, so I will be sleeping 17 seconds ...
This amazing program was run in agrimonia, a i686 on Wed Sep 29 15:24:19 WEST 2004
The argument you passed me is 18, so I will be sleeping 18 seconds ...
This amazing program was run in agrimonia, a i686 on Wed Sep 29 15:24:21 WEST 2004
The argument you passed me is 19, so I will be sleeping 19 seconds ...
This amazing program was run in rambutan, a i686 on Wed Sep 29 15:24:44 WEST 2004
The argument you passed me is 1, so I will be sleeping 1 seconds ...
This amazing program was run in trueno, a i686 on Wed Sep 29 15:23:31 WEST 2004
The argument you passed me is 2, so I will be sleeping 2 seconds ...
This amazing program was run in agrimonia, a i686 on Wed Sep 29 15:23:34 WEST 2004
The argument you passed me is 3, so I will be sleeping 3 seconds ...
This amazing program was run in agrimonia, a i686 on Wed Sep 29 15:23:36 WEST 2004
The argument you passed me is 4, so I will be sleeping 4 seconds ...
This amazing program was run in rambutan, a i686 on Wed Sep 29 15:23:40 WEST 2004
The argument you passed me is 5, so I will be sleeping 5 seconds ...
This amazing program was run in rambutan, a i686 on Wed Sep 29 15:23:42 WEST 2004
The argument you passed me is 6, so I will be sleeping 6 seconds ...
This amazing program was run in coco, a i686 on Wed Sep 29 15:23:47 WEST 2004
I yawn, therefore I will be sleeping 7 seconds ...
This amazing program was run in faya, a sun4u on Wed Sep 29 15:23:51 WEST 2004
The argument you passed me is 8, so I will be sleeping 8 seconds ...
This amazing program was run in botero, a i686 on Wed Sep 29 15:23:48 WEST 2004
The argument you passed me is 9, so I will be sleeping 9 seconds ...
This amazing program was run in botero, a i686 on Wed Sep 29 15:23:54 WEST 2004
[angelv@guinda Condor-Course]$
</pre>




<h3><a name="SECTION00045200000000000000"></a><a name="ex_R"></a>Exercise</h3>

<br />

<p>
In the previous example, we have used the keyword ``arguments'' in order to
customize each run of the program. For this exercise we will use the keyword
``input'', which indicates a file that contains the standard input (i.e. what
you would normally type in the keyboard) for your program. 
</p>

<p>
For this, we are going to use the R statistical package, which is installed for
both Linux and Solaris. The test file <em>test.R</em> contains:
</p>

<pre>
2+2
q()
</pre>

<p>
These are the commands that you would type into R to do the unimaginative task
of adding 2 + 2 and quitting. You can try it out like this:
</p>

<pre>
[angelv@guinda ~/Condor-Course]$ R --vanilla &lt; test.R

R : Copyright 2003, The R Development Core Team
Version 1.8.0  (2003-10-08)

R is free software and comes with ABSOLUTELY NO WARRANTY.
You are welcome to redistribute it under certain conditions.
Type 'license()' or 'licence()' for distribution details.

R is a collaborative project with many contributors.
Type 'contributors()' for more information.

Type 'demo()' for some demos, 'help()' for on-line help, or
'help.start()' for a HTML browser interface to help.
Type 'q()' to quit R.

&gt; 2+2
[1] 4
&gt; q()
[angelv@guinda ~/Condor-Course]$
</pre>

<p>
Amazingly we get a 4 as the answer! Now, your task is to modify the previous
example and prepare a submission file that will run 2 jobs in R, one to
calculate 2+2 and another one to calculate 3+3.
</p>


<hr />
<!--Navigation Panel-->
<a name="tex2html162"  href="node5.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png"></a> 
<a name="tex2html158"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png"></a> 
<a name="tex2html152"  href="node3.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png"></a> 
<a name="tex2html160"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png"></a>  

<br />

<strong> Next:</strong> <a name="tex2html163"  href="node5.php">Managing jobs</a>
<strong> Up:</strong> <a name="tex2html159"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html153"  href="node3.php">Introduction</a>
 &nbsp; 
<strong>  <a name="tex2html161"  href="node1.php">Contents</a></strong> 
<!--End of Navigation Panel-->

<address>
Angel M de Vicente
2004-10-25
</address>

</body>
</html>
