<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Hands-on session with Condor: Workbook - 
      Answer to exercises"; ?>
<?php $metadescription="Hands-on session with Condor: Workbook  - Answer to exercises "; ?>

<?php include("header_course.php"); ?>


<!--Navigation Panel-->
<a name="tex2html266"  href="node10.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png" /></a> 
<a name="tex2html262"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png" /></a> 
<a name="tex2html256"  href="node8.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png" /></a> 
<a name="tex2html264"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png" /></a>  
<br />

<strong> Next:</strong> <a name="tex2html267"  href="node10.php">About this document ...</a>
<strong> Up:</strong> <a name="tex2html263"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html257"  href="node8.php">Last remarks</a>
 &nbsp; 
<strong>  <a name="tex2html265"  href="node1.php">Contents</a></strong> 
<br />
<br />
<!--End of Navigation Panel-->

<!--Table of Child-Links-->
<a name="CHILD_LINKS"><strong>Subsections</strong></a>

<ul>
<li><a name="tex2html268"  href="node9.php#SECTION00091000000000000000">Answers to exercises in section 2.1.3</a>
<li><a name="tex2html269"  href="node9.php#SECTION00092000000000000000">Answer to exercise in section 3.2.2</a>
<li><a name="tex2html270"  href="node9.php#SECTION00093000000000000000">Answer to exercise in section 3.5.2</a>
<li><a name="tex2html271"  href="node9.php#SECTION00094000000000000000">Answer to exercise in section 4.6</a>
<li><a name="tex2html272"  href="node9.php#SECTION00095000000000000000">Answer to exercise in section 6.1.2</a>
<li><a name="tex2html273"  href="node9.php#SECTION00096000000000000000">Answer to exercises in section 6.3</a>
<ul>
<li><a name="tex2html274"  href="node9.php#SECTION00096100000000000000">Exercise 1</a>
<li><a name="tex2html275"  href="node9.php#SECTION00096200000000000000">Exercise 2</a>
</ul></ul>
<!--End of Table of Child-Links-->
<hr />


<h1><a name="SECTION00090000000000000000">Answers to exercises</a></h1>



<h2>
<a name="SECTION00091000000000000000">Answers to exercises in section </a>
<a href="node3.php#ex_condor_status">2.1.3</a>
</h2>



<ol>
<li><pre>condor_status -constraint OpSys==\"LINUX\" -sort Memory
</pre>
</li>
<li><pre>
condor_status -java -constraint 'OpSys == "SOLARIS29"'
 -format "The machine %s " Machine -format "has Java Version: %s \n" JavaVersion
</pre>
</li>
</ol>



<h2>
<a name="SECTION00092000000000000000">Answer to exercise in section </a>
<a href="node4.php#ex_disk_info">3.2.2</a>
</h2>

<p>
The disk_info.sh file could be:</p>


<pre>
#!/bin/sh
echo `uname -n`
df -h | grep " /scratch"
</pre>

<p>
Given this file, a basic submission file for it would be:</p>


<pre>
########################################################
##
## Sample solution for exercise 1
##
##
########################################################

executable = disk_info.sh
universe = vanilla
output = exercise1.out
error =  exercise1.err
log =    exercise1.log
queue
</pre>



<h2>
<a name="SECTION00093000000000000000">Answer to exercise in section </a>
<a href="node4.php#ex_R">3.5.2</a>
</h2>

<p>
After you have created test0.R and test1.R to contain the different instructions
to R, you could submit to Condor the following file:</p>


<pre>
########################################################
##
## Exercise 2
##
## A realistic submission file
##
########################################################

executable = /usr/local/bin/R
universe = vanilla
Requirements = Memory &gt;= 1000 &amp;&amp; ((Arch == "INTEL" &amp;&amp; OpSys == "LINUX") || \
                                  (Arch == "SUN4u" &amp;&amp; OpSys == "SOLARIS29"))
Rank = Memory

Initialdir = /net/guinda/scratch/angelv/Condor-Course/
arguments = --vanilla
input = test$(Process).R
output = exercise2.$(Process).out
error =  exercise2.$(Process).err
log =    exercise2.log
queue 2
</pre>



<h2>
<a name="SECTION00094000000000000000">Answer to exercise in section </a>
<a href="node5.php#ex_condor_history">4.6</a>
</h2>


<pre>
[angelv@guinda ~/Condor-Course]$ condor_history -constraint 
                            'RemoveReason=!=UNDEFINED &amp;&amp; User=="adrians@iac.es"'
(RemoveReason=!=UNDEFINED &amp;&amp; User=="adrians@iac.es")
 ID      OWNER            SUBMITTED     RUN_TIME ST   COMPLETED CMD
 143.0   adrians         7/27 11:51   0+00:00:23 X   ???        /home/adrians/c
 144.0   adrians         7/27 11:52   0+00:00:52 X   ???        /home/adrians/c
 144.4   adrians         7/27 11:52   0+00:00:51 X   ???        /home/adrians/c
 144.5   adrians         7/27 11:52   0+00:00:49 X   ???        /home/adrians/c
 144.8   adrians         7/27 11:52   0+00:00:57 X   ???        /home/adrians/c
 144.9   adrians         7/27 11:52   0+00:00:55 X   ???        /home/adrians/c
 144.1   adrians         7/27 11:52   0+00:01:03 X   ???        /home/adrians/c
 144.2   adrians         7/27 11:52   0+00:01:01 X   ???        /home/adrians/c
 144.3   adrians         7/27 11:52   0+00:00:59 X   ???        /home/adrians/c
 144.6   adrians         7/27 11:52   0+00:00:50 X   ???        /home/adrians/c
 144.7   adrians         7/27 11:52   0+00:00:48 X   ???        /home/adrians/c
 146.0   adrians         7/27 12:05   0+00:00:12 X   ???        /tmp/adrians/my
 146.1   adrians         7/27 12:05   0+00:00:13 X   ???        /tmp/adrians/my
 146.3   adrians         7/27 12:05   0+00:00:10 X   ???        /tmp/adrians/my
 146.4   adrians         7/27 12:05   0+00:00:10 X   ???        /tmp/adrians/my
 146.2   adrians         7/27 12:05   0+00:00:36 X   ???        /tmp/adrians/my
 147.0   adrians         7/27 12:40   0+06:56:21 X   ???        /tmp/adrians/my
 147.1   adrians         7/27 12:40   0+04:26:55 X   ???        /tmp/adrians/my
 147.2   adrians         7/27 12:40   0+05:14:00 X   ???        /tmp/adrians/my
 147.3   adrians         7/27 12:40   0+04:17:06 X   ???        /tmp/adrians/my
 147.4   adrians         7/27 12:40   0+03:51:35 X   ???        /tmp/adrians/my
[angelv@guinda ~/Condor-Course]$
</pre>



<h2>
<a name="SECTION00095000000000000000">Answer to exercise in section </a>
<a href="node7.php#ex_basic_dag">6.1.2</a>
</h2>


<pre>
# Filename: diamond.dag
#
Job  A  A.condor 
Job  B  B.condor 
Job  C  C.condor
Job  D  D.condor
PARENT A CHILD B C
PARENT B C CHILD D

-----------------------------------------

########################################################
##
## A.condor
##
## Simple condor job description file
##
########################################################
executable = A.sh
universe = vanilla
output = A.out
error =  A.err
log =    dagman_example.log
queue

----------------------------------------

#!/bin/sh
# Filename: A.sh
#
echo This is the output of Job A for Job B &gt; B.input
echo This is the output of Job A for Job C &gt; C.input

----------------------------------------

########################################################
##
## B.condor
##
## Simple condor job description file
##
########################################################
executable = B.sh
universe = vanilla
output = B.out
error =  B.err
log =    dagman_example.log
queue

----------------------------------------

#!/bin/sh
# Filename: B.sh
#
echo `cat B.input` after being massaged by Job B &gt;&gt; B.output

----------------------------------------

########################################################
##
## C.condor
##
## Simple condor job description file
##
########################################################
executable = C.sh
universe = vanilla
output = C.out
error =  C.err
log =    dagman_example.log
queue

----------------------------------------

#!/bin/sh
# Filename: C.sh
#
echo `cat C.input` after being massaged by Job C &gt;&gt; C.output

----------------------------------------

########################################################
##
## D.condor
##
## Simple condor job description file
##
########################################################
executable = D.sh
universe = vanilla
output = D.out
error =  D.err
log =    dagman_example.log
queue

----------------------------------------

#!/bin/sh
# Filename: D.sh
#
cat B.output C.output
</pre>

<p>
After running the code, your directory should look like:</p>


<pre>
  /home/angelv/Condor-Course/Exercises/dagman1:
  used 26 available 50764572
  -rw-r--r--    1 angelv   games         275 sep 30 14:17 A.condor
  -rw-r--r--    1 angelv   games           0 sep 30 14:19 A.err
  -rw-r--r--    1 angelv   games           0 sep 30 14:19 A.out
  -rwxr-xr-x    1 angelv   games         138 sep 30 14:08 A.sh
  -rw-r--r--    1 angelv   games         275 sep 30 14:17 B.condor
  -rw-r--r--    1 angelv   games           0 sep 30 14:20 B.err
  -rw-r--r--    1 angelv   games          38 sep 30 14:19 B.input
  -rw-r--r--    1 angelv   games           0 sep 30 14:20 B.out
  -rw-r--r--    1 angelv   games          68 sep 30 14:20 B.output
  -rwxr-xr-x    1 angelv   games          93 sep 30 14:11 B.sh
  -rw-r--r--    1 angelv   games         275 sep 30 14:17 C.condor
  -rw-r--r--    1 angelv   games           0 sep 30 14:20 C.err
  -rw-r--r--    1 angelv   games          38 sep 30 14:19 C.input
  -rw-r--r--    1 angelv   games           0 sep 30 14:20 C.out
  -rw-r--r--    1 angelv   games          68 sep 30 14:20 C.output
  -rwxr-xr-x    1 angelv   games          93 sep 30 14:12 C.sh
  -rw-------    1 angelv   games        2486 sep 30 14:21 dagman_example.log
  -rw-r--r--    1 angelv   games         275 sep 30 14:17 D.condor
  -rw-r--r--    1 angelv   games           0 sep 30 14:21 D.err
  -rw-r--r--    1 angelv   games         135 sep 28 09:46 diamond.dag
  -rw-r--r--    1 angelv   games         508 sep 30 14:17 diamond.dag.condor.sub
  -rw-r--r--    1 angelv   games         606 sep 30 14:21 diamond.dag.dagman.log
  -rw-r--r--    1 angelv   games        5516 sep 30 14:21 diamond.dag.dagman.out
  -rw-r--r--    1 angelv   games          29 sep 30 14:21 diamond.dag.lib.out
  -rw-r--r--    1 angelv   games         136 sep 30 14:21 D.out
  -rwxr-xr-x    1 angelv   games          54 sep 30 14:12 D.sh
</pre>

<p>
You can get the details of everything that happened in the files
dagman_example_log and diamond.dag.dagman.out. The important bit, the results,
are in the file D.out and should look like:
</p>

<pre>
This is the output of Job A for Job B after being massaged by Job B
This is the output of Job A for Job C after being massaged by Job C
</pre>



<h2>
<a name="SECTION00096000000000000000">Answer to exercises in section </a>
<a href="node7.php#ex_advanced_dag">6.3</a>
</h2>



<h3><a name="SECTION00096100000000000000">Exercise 1</a></h3>

<p>
You don't need to make many changes for this. One possible solution implies just
changing the diadmon.dag file to:</p>


<pre>
# Filename: diamond.dag
#
Job  A  A.condor 
Job  B  B.condor 
Job  C  C.condor
Job  D  D.condor
SCRIPT POST B post.pl $JOB
SCRIPT POST C post.pl $JOB
SCRIPT POST D post.pl $JOB
PARENT A CHILD B C
PARENT B C CHILD D
</pre>

<p>
And writing a script to take care of the file deletes and compressions. An
example in perl could be:</p>


<pre>
#!/usr/bin/perl

# Filename: post.pl
#
if (@ARGV[0] eq "B") {
    unlink "B.input";
} elsif (@ARGV[0] eq "C") {
    unlink "C.input";
} elsif (@ARGV[0] eq "D") {
    unlink "B.output";
    unlink "C.output";
    system "gzip D.out";
}
</pre>

<p>
With these changes, when we submit the job to condor, we end up without
temporary files, and with a gzipped results file (of course we could also
automatically delete all the *.err and *.out files, etc.):</p>


<pre>
  /home/angelv/Condor-Course/Exercises/dagman_advanced_1:
  used 24 available 50671203
  -rw-r--r--    1 angelv   games         275 sep 30 14:17 A.condor
  -rw-r--r--    1 angelv   games           0 sep 30 15:49 A.err
  -rw-r--r--    1 angelv   games           0 sep 30 15:49 A.out
  -rwxr-xr-x    1 angelv   games         138 sep 30 14:08 A.sh
  -rw-r--r--    1 angelv   games         275 sep 30 14:17 B.condor
  -rw-r--r--    1 angelv   games           0 sep 30 15:50 B.err
  -rw-r--r--    1 angelv   games           0 sep 30 15:50 B.out
  -rwxr-xr-x    1 angelv   games          93 sep 30 14:11 B.sh
  -rw-r--r--    1 angelv   games         275 sep 30 14:17 C.condor
  -rw-r--r--    1 angelv   games           0 sep 30 15:50 C.err
  -rw-r--r--    1 angelv   games           0 sep 30 15:50 C.out
  -rwxr-xr-x    1 angelv   games          93 sep 30 14:12 C.sh
  -rw-------    1 angelv   games        2794 sep 30 15:51 dagman_example.log
  -rw-r--r--    1 angelv   games         275 sep 30 14:17 D.condor
  -rw-r--r--    1 angelv   games           0 sep 30 15:51 D.err
  -rw-r--r--    1 angelv   games         216 sep 30 15:29 diamond.dag
  -rw-r--r--    1 angelv   games         508 sep 30 15:48 diamond.dag.condor.sub
  -rw-r--r--    1 angelv   games         606 sep 30 15:52 diamond.dag.dagman.log
  -rw-r--r--    1 angelv   games        6882 sep 30 15:52 diamond.dag.dagman.out
  -rw-r--r--    1 angelv   games          29 sep 30 15:52 diamond.dag.lib.out
  -rw-r--r--    1 angelv   games          94 sep 30 15:51 D.out.gz
  -rwxr-xr-x    1 angelv   games          54 sep 30 14:12 D.sh
  -rwxr-xr-x    1 angelv   games         214 sep 30 15:46 post.pl
</pre>



<h3><a name="SECTION00096200000000000000">Exercise 2</a></h3>

<p>
In order to make the node fail, we could change the diamong.dag file to:</p>


<pre>
# Filename: diamond.dag
#
Job  A  A.condor 
Job  B  B.condor 
Job  C  C.condor
Job  D  D.condor

SCRIPT POST B post.pl $JOB
SCRIPT PRE C pre.pl $JOB
SCRIPT POST C post.pl $JOB
SCRIPT POST D post.pl $JOB
PARENT A CHILD B C
PARENT B C CHILD D
</pre>

<p>
So now the script pre.pl will run before job C. Let's make the script pre.pl
fail by writing a syntax error:</p>


<pre>
#!/usr/bin/perl

# Filename: pre.pl
#
if (@ARGV[0] eq "C") {
    unlin "C.input";
}
</pre>

<p>
If we now submit the job, we will find that after a while, the job gets
unqueued, and by looking at the end of file diamond.dag.dagman.out we get:</p>


<pre>
[...]
9/30 16:13:19 Job A completed successfully.
9/30 16:13:19 Running PRE script of Job C...
9/30 16:13:19 Of 4 nodes total:
9/30 16:13:19  Done     Pre   Queued    Post   Ready   Un-Ready   Failed
9/30 16:13:19   ===     ===      ===     ===     ===        ===      ===
9/30 16:13:19     1       1        0       0       1          1        0
9/30 16:13:19 PRE Script of Job C failed with status 9
9/30 16:13:25 Submitting Condor Job B ...
9/30 16:13:25 submitting: condor_submit  -a 'dag_node_name = B' -a '+DAGManJobID
         = 224.0' -a 'submit_event_notes = DAG Node: $(dag_node_name)' B.condor 2&gt;&amp;1
9/30 16:13:27   assigned Condor ID (226.0.0)
9/30 16:13:27 Just submitted 1 job this cycle...
9/30 16:13:27 Event: ULOG_SUBMIT for Condor Job B (226.0.0)
9/30 16:13:27 Of 4 nodes total:
9/30 16:13:27  Done     Pre   Queued    Post   Ready   Un-Ready   Failed
9/30 16:13:27   ===     ===      ===     ===     ===        ===      ===
9/30 16:13:27     1       0        1       0       0          1        1
9/30 16:14:12 Event: ULOG_EXECUTE for Condor Job B (226.0.0)
9/30 16:14:12 Event: ULOG_JOB_TERMINATED for Condor Job B (226.0.0)
9/30 16:14:12 Job B completed successfully.
9/30 16:14:12 Running POST script of Job B...
9/30 16:14:12 Of 4 nodes total:
9/30 16:14:12  Done     Pre   Queued    Post   Ready   Un-Ready   Failed
9/30 16:14:12   ===     ===      ===     ===     ===        ===      ===
9/30 16:14:12     1       0        0       1       0          1        1
9/30 16:14:17 Event: ULOG_POST_SCRIPT_TERMINATED for Condor Job B (226.0.0)
9/30 16:14:17 POST Script of Job B completed successfully.
9/30 16:14:17 Of 4 nodes total:
9/30 16:14:17  Done     Pre   Queued    Post   Ready   Un-Ready   Failed
9/30 16:14:17   ===     ===      ===     ===     ===        ===      ===
9/30 16:14:17     2       0        0       0       0          1        1
9/30 16:14:17 ERROR: the following job(s) failed:
9/30 16:14:17 ---------------------- Job ----------------------
9/30 16:14:17       Node Name: C
9/30 16:14:17          NodeID: 2
9/30 16:14:17     Node Status: STATUS_ERROR    
9/30 16:14:17           Error: PRE Script failed with status 9
9/30 16:14:17 Job Submit File: C.condor
9/30 16:14:17      PRE Script: pre.pl $JOB
9/30 16:14:17     POST Script: post.pl $JOB
9/30 16:14:17   Condor Job ID: [not yet submitted]
9/30 16:14:17       Q_PARENTS: 0, &lt;END&gt;
9/30 16:14:17       Q_WAITING: &lt;END&gt;
9/30 16:14:17      Q_CHILDREN: 3, &lt;END&gt;
9/30 16:14:17 ---------------------------------------  &lt;END&gt;
9/30 16:14:17 Aborting DAG...
9/30 16:14:17 Writing Rescue DAG to diamond.dag.rescue...
9/30 16:14:17 **** condor_scheduniv_exec.224.0 (condor_DAGMAN) EXITING WITH STATUS 1
</pre>

<p>
So, we see that the PRE script of Job C failed, but nevertheless nodes A and B
did complete OK. If we inspect the rescue file created, we see:</p>


<pre>
# Rescue DAG file, created after running
#   the diamond.dag DAG file
#
# Total number of Nodes: 4
# Nodes premarked DONE: 2
# Nodes that failed: 1
#   C,&lt;ENDLIST&gt;

JOB A A.condor DONE

JOB B B.condor DONE
SCRIPT POST B post.pl $JOB

JOB C C.condor 
SCRIPT PRE  C pre.pl $JOB
SCRIPT POST C post.pl $JOB

JOB D D.condor 
SCRIPT POST D post.pl $JOB


PARENT A CHILD B C
PARENT B CHILD D
PARENT C CHILD D
</pre>

<p>
This is just a regular DAG submission file, so we can edit it. Note the DONE
tags, which will indicate to Condor not to retry those Jobs. We can just comment
the line for the C PRE script, and submit this DAG rescue file again. As you can
see from the logs, Condor understands that two jobs have already been completed,
and it won't execute them again.</p>


<pre>
[angelv@guinda dagman_advanced_2]$ condor_submit_dag diamond.dag.rescue

-----------------------------------------------------------------------
File for submitting this DAG to Condor           : diamond.dag.rescue.condor.sub
Log of DAGMan debugging messages                 : diamond.dag.rescue.dagman.out
Log of Condor library debug messages             : diamond.dag.rescue.lib.out
Log of the life of condor_dagman itself          : diamond.dag.rescue.dagman.log

Condor Log file for all Condor jobs of this DAG: diamond.dag.rescue.dummy_log
Submitting job(s).
Logging submit event(s).
1 job(s) submitted to cluster 401.
-----------------------------------------------------------------------

[angelv@guinda dagman_advanced_2]$ cat diamond.dag.rescue.dagman.out

10/25 10:34:32 ******************************************************
10/25 10:34:32 ** condor_scheduniv_exec.401.0 (CONDOR_DAGMAN) STARTING UP
10/25 10:34:32 ** /home/condor/local.guinda/spool/cluster401.ickpt.subproc0
10/25 10:34:32 ** $CondorVersion: 6.6.7 Oct 11 2004 $
10/25 10:34:32 ** $CondorPlatform: I386-LINUX_RH9 $
10/25 10:34:32 ** PID = 4228
10/25 10:34:32 ******************************************************
10/25 10:34:32 Using config file: /home/condor/condor_config
10/25 10:34:32 Using local config files: /home/condor/condor_config.INTEL.LINUX /home/condor/local.guinda/condor_config.local
10/25 10:34:32 DaemonCore: Command Socket at &lt;161.72.81.187:30023&gt;
10/25 10:34:32 argv[0] == "condor_scheduniv_exec.401.0"
10/25 10:34:32 argv[1] == "-Debug"
10/25 10:34:32 argv[2] == "3"
10/25 10:34:32 argv[3] == "-Lockfile"
10/25 10:34:32 argv[4] == "diamond.dag.rescue.lock"
10/25 10:34:32 argv[5] == "-Dag"
10/25 10:34:32 argv[6] == "diamond.dag.rescue"
10/25 10:34:32 argv[7] == "-Rescue"
10/25 10:34:32 argv[8] == "diamond.dag.rescue.rescue"
10/25 10:34:32 argv[9] == "-Condorlog"
10/25 10:34:32 argv[10] == "diamond.dag.rescue.dummy_log"
10/25 10:34:32 DAG Lockfile will be written to diamond.dag.rescue.lock
10/25 10:34:32 DAG Input file is diamond.dag.rescue
10/25 10:34:32 Rescue DAG will be written to diamond.dag.rescue.rescue
10/25 10:34:32 All DAG node user log files:
10/25 10:34:32   /home/angelv/Condor-Course/Exercises/dagman_advanced_2/dagman_example.log
10/25 10:34:32 Parsing diamond.dag.rescue ...
10/25 10:34:32 jobName: B
10/25 10:34:32 jobName: C
10/25 10:34:32 jobName: D
10/25 10:34:32 Dag contains 4 total jobs
10/25 10:34:32 Deleting any older versions of log files...
10/25 10:34:32 Deleting older version of /home/angelv/Condor-Course/Exercises/dagman_advanced_2/dagman_example.log
10/25 10:34:32 Bootstrapping...
10/25 10:34:32 Number of pre-completed jobs: 2
10/25 10:34:32 Registering condor_event_timer...
10/25 10:34:34 Submitting Condor Job C ...
10/25 10:34:34 submitting: condor_submit  -a 'dag_node_name = C' -a '+DAGManJobID = 401.0' -a 'submit_event_notes = DAG Node: $(dag_node_name)' C.condor 2&gt;&amp;1
10/25 10:34:35  assigned Condor ID (402.0.0)
10/25 10:34:35 Just submitted 1 job this cycle...
10/25 10:34:35 Event: ULOG_SUBMIT for Condor Job C (402.0.0)
10/25 10:34:35 Of 4 nodes total:
10/25 10:34:35  Done     Pre   Queued    Post   Ready   Un-Ready   Failed
10/25 10:34:35   ===     ===      ===     ===     ===        ===      ===
10/25 10:34:35     2       0        1       0       0          1        0
10/25 10:37:40 Event: ULOG_EXECUTE for Condor Job C (402.0.0)
10/25 10:37:40 Event: ULOG_JOB_TERMINATED for Condor Job C (402.0.0)
10/25 10:37:40 Job C completed successfully.
10/25 10:37:40 Running POST script of Job C...
10/25 10:37:40 Of 4 nodes total:
10/25 10:37:40  Done     Pre   Queued    Post   Ready   Un-Ready   Failed
10/25 10:37:40   ===     ===      ===     ===     ===        ===      ===
10/25 10:37:40     2       0        0       1       0          1        0
10/25 10:37:45 Event: ULOG_POST_SCRIPT_TERMINATED for Condor Job C (402.0.0)
10/25 10:37:45 POST Script of Job C completed successfully.
10/25 10:37:45 Of 4 nodes total:
10/25 10:37:45  Done     Pre   Queued    Post   Ready   Un-Ready   Failed
10/25 10:37:45   ===     ===      ===     ===     ===        ===      ===
10/25 10:37:45     3       0        0       0       1          0        0
10/25 10:37:51 Submitting Condor Job D ...
10/25 10:37:51 submitting: condor_submit  -a 'dag_node_name = D' -a '+DAGManJobID = 401.0' -a 'submit_event_notes = DAG Node: $(dag_node_name)' D.condor 2&gt;&amp;1
10/25 10:37:52  assigned Condor ID (404.0.0)
10/25 10:37:52 Just submitted 1 job this cycle...
10/25 10:37:52 Event: ULOG_SUBMIT for Condor Job D (404.0.0)
10/25 10:37:52 Of 4 nodes total:
10/25 10:37:52  Done     Pre   Queued    Post   Ready   Un-Ready   Failed
10/25 10:37:52   ===     ===      ===     ===     ===        ===      ===
10/25 10:37:52     3       0        1       0       0          0        0
10/25 10:40:37 Event: ULOG_EXECUTE for Condor Job D (404.0.0)
10/25 10:40:37 Event: ULOG_JOB_TERMINATED for Condor Job D (404.0.0)
10/25 10:40:37 Job D completed successfully.
10/25 10:40:37 Running POST script of Job D...
10/25 10:40:37 Of 4 nodes total:
10/25 10:40:37  Done     Pre   Queued    Post   Ready   Un-Ready   Failed
10/25 10:40:37   ===     ===      ===     ===     ===        ===      ===
10/25 10:40:37     3       0        0       1       0          0        0
10/25 10:40:42 Event: ULOG_POST_SCRIPT_TERMINATED for Condor Job D (404.0.0)
10/25 10:40:42 POST Script of Job D completed successfully.
10/25 10:40:42 Of 4 nodes total:
10/25 10:40:42  Done     Pre   Queued    Post   Ready   Un-Ready   Failed
10/25 10:40:42   ===     ===      ===     ===     ===        ===      ===
10/25 10:40:42     4       0        0       0       0          0        0
10/25 10:40:42 All jobs Completed!
10/25 10:40:42 **** condor_scheduniv_exec.401.0 (condor_DAGMAN) EXITING WITH STATUS 0

[angelv@guinda dagman_advanced_2]$
</pre>


<hr />
<!--Navigation Panel-->
<a name="tex2html266"  href="node10.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png"></a> 
<a name="tex2html262"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png"></a> 
<a name="tex2html256"  href="node8.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png"></a> 
<a name="tex2html264"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png"></a>  

<br />

<strong> Next:</strong> <a name="tex2html267"  href="node10.php">About this document ...</a>
<strong> Up:</strong> <a name="tex2html263"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html257"  href="node8.php">Last remarks</a>
 &nbsp; 
<strong> <a name="tex2html265" href="node1.php">Contents</a></strong> 
<!--End of Navigation Panel-->

<address>
Angel M de Vicente
2004-10-25
</address>

</body>
</html>
