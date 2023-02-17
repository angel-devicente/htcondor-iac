<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Hands-on session with Condor: Workbook  - Managing Jobs"; ?>
<?php $metadescription="Hands-on session with Condor: Workbook  - Managing Jobs "; ?>

<?php include("header_course.php"); ?>

<!--Navigation Panel-->
<a name="tex2html197"  href="node6.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png"></a> 
<a name="tex2html193"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png"></a> 
<a name="tex2html187"  href="node4.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png"></a> 
<a name="tex2html195"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png"></a>  

<br />

<strong> Next:</strong> <a name="tex2html198"  href="node6.php">Standard Universe</a>
<strong> Up:</strong> <a name="tex2html194"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html188"  href="node4.php">Basic job submission</a>
 &nbsp; 
<strong>  <a name="tex2html196"  href="node1.php">Contents</a></strong> 

<br />
<br />
<!--End of Navigation Panel-->

<!--Table of Child-Links-->
<a name="CHILD_LINKS"><strong>Subsections</strong></a>

<ul>
<li><a name="tex2html199"  href="node5.php#SECTION00051000000000000000">Checking on the progress of jobs
</a>
<ul>

<li><a name="tex2html200"  href="node5.php#SECTION00051100000000000000">Condor Job Monitor</a>
</ul>
<br />
<li><a name="tex2html201"  href="node5.php#SECTION00052000000000000000">Removing a job from the queue</a>
<li><a name="tex2html202"  href="node5.php#SECTION00053000000000000000">Changing the priority of jobs</a>
<li><a name="tex2html203"  href="node5.php#SECTION00054000000000000000">Why does the job not run?</a>
<li><a name="tex2html204"  href="node5.php#SECTION00055000000000000000">Job Completion</a>
<li><a name="tex2html205"  href="node5.php#SECTION00056000000000000000">Exercise</a>
</ul>
<!--End of Table of Child-Links-->

<hr />

<h1 ><a name="SECTION00050000000000000000">Managing jobs</a></h1>

<p>This section provides a brief summary of some other things that can be done
once jobs are submitted. The basic mechanisms for monitoring a job are
introduced, but the commands are discussed briefly. You are encouraged to look
at the man pages of the commands referred to for more information.
</p>

<p>
When jobs are submitted, Condor will attempt to find resources to run the
jobs. A list of all those with jobs submitted may be obtained through condor_
status with the -submitters option. An example of this would yield output
similar to:
</p>

<pre>
[angelv@guinda ~/Condor-Course]$ condor_status -submitters

Name                 Machine      Running IdleJobs HeldJobs

apadron@iac.es       cormoran.i         1        0        0
delgadom@iac.es      gladiolo.i         1        0        0
angelv@iac.es        guinda.iac         1        0        0
delgadom@iac.es      lila.iac.e        22       28        0
plopez@iac.es        naranja.ia        81       62        0
apadron@iac.es       rex.iac.es         0        0       24

                           RunningJobs           IdleJobs           HeldJobs

       angelv@iac.es                 1                  0                  0
      apadron@iac.es                 1                  0                 24
     delgadom@iac.es                23                 28                  0
       plopez@iac.es                81                 62                  0

               Total               106                 90                 24
</pre>


<h2><a name="SECTION00051000000000000000">Checking on the progress of jobs</a></h2>

<p>
As we have seen, you can check on the status of your jobs with the condor_q
command. The output contains many columns of information about the queued
jobs. The ST column (for status) shows the status of current jobs in the
queue. An R in the status column means the the job is currently running. An I
stands for idle. The job is not running right now, because it is waiting for a
machine to become available. The status H is the hold state. In the hold state,
the job will not be scheduled to run until it is released (see the condor_hold
reference page and the condor_release reference page).
</p>

<p>
To get more detailed information about the queued jobs, you can use the option
-l with condor_q command.
</p>


<pre>
[angelv@guinda ~]$ condor_q -l 3881.0

-- Schedd: naranja.iac.es : &lt;161.72.64.97:33152&gt;
MyType = "Job"
TargetType = "Machine"
ClusterId = 3881
QDate = 1097666845
CompletionDate = 0
Owner = "plopez"
RemoteWallClockTime = 0.000000
LocalUserCpu = 0.000000
LocalSysCpu = 0.000000
RemoteUserCpu = 0.000000
RemoteSysCpu = 0.000000
ExitStatus = 0
NumCkpts = 0
NumRestarts = 0
NumSystemHolds = 0
CommittedTime = 0
TotalSuspensions = 0
LastSuspensionTime = 0
CumulativeSuspensionTime = 0
ExitBySignal = FALSE
CondorVersion = "$CondorVersion: 6.6.3 Mar 29 2004 $"
CondorPlatform = "$CondorPlatform: SUN4X-SOLARIS29 $"
RootDir = "/"
Iwd = "/home/plopez/tmp/run_41/."
JobUniverse = 5
Cmd = "/home/plopez/tmp/run_41/../setiathome-3.03.sparcv9-sun-solaris2.7/setiathome"
MinHosts = 1
MaxHosts = 1
CurrentHosts = 0
WantRemoteSyscalls = FALSE
WantCheckpoint = FALSE
JobStatus = 1
EnteredCurrentStatus = 1097666845
JobPrio = 0
User = "plopez@iac.es"
NiceUser = FALSE
Env = ""
JobNotification = 0
UserLog = "/home/plopez/tmp/run_41/./results.log"

[...]

[angelv@guinda ~]$
</pre>

<p>
You can also find all the machines that are running your job through the
condor_status command. For example, to find all the machines that are running
jobs submitted by ``breach@cs.wisc.edu,'' type:
</p>


<pre>
%  condor_status -constraint 'RemoteUser == "breach@cs.wisc.edu"'

Name       Arch     OpSys        State      Activity   LoadAv Mem  ActvtyTime

alfred.cs. INTEL    SOLARIS251   Claimed    Busy       0.980  64    0+07:10:02
biron.cs.w INTEL    SOLARIS251   Claimed    Busy       1.000  128   0+01:10:00
cambridge. INTEL    SOLARIS251   Claimed    Busy       0.988  64    0+00:15:00
falcons.cs INTEL    SOLARIS251   Claimed    Busy       0.996  32    0+02:05:03
happy.cs.w INTEL    SOLARIS251   Claimed    Busy       0.988  128   0+03:05:00
istat03.st INTEL    SOLARIS251   Claimed    Busy       0.883  64    0+06:45:01
istat04.st INTEL    SOLARIS251   Claimed    Busy       0.988  64    0+00:10:00
istat09.st INTEL    SOLARIS251   Claimed    Busy       0.301  64    0+03:45:00
...
</pre>



<h3><a name="SECTION00051100000000000000">Condor Job Monitor</a></h3>

<p>The <a href="http://www.cs.wisc.edu/condor/manual/v7.0/2_14Job_Monitor.html">Condor Job Monitor</a> is  
is a Java application to see
graphically the log files created when you submit jobs (see figure
<a href="#fig:job_monitor">1</a> for a screenshot). This can be quite useful, for example
to quickly find out how many times your jobs were evicted, so that you can plan
your next submission more eficiently.</p>

<p>
Although it looks like the development of this application has been more or less
abandoned, there is a limited version of it at the IAC. Thus, you can use the
Job Monitor, although with two big limitations:</p>

<p>
1. You won't be able to open log files from inside the application (well, you
   can open them, but they won't be parsed correctly).</p>

<p>
2. The graphs won't be updated automatically as the log files are generated, you
   will have to quit the application and restart it again.</p>

<p>
Despite these limitations, the Job Monitor can be useful to see the overall
progress of your jobs. In order to use it, you just type: <em>logview 
<img width="15" height="29" class="img-nav"
 src="img1.png"
 alt="$&lt;$">logfile<img width="15" height="29" class="img-nav"
 src="img2.png"
 alt="$&gt;$"></em>. For example,</p>


<pre>
[angelv at guinda CONDOR]$ logview results.log
REMEMBER TO ALWAYS OPEN LOG FILES FROM THE COMMAND LINE
IF OPENED FROM THE APPLICATION MENU, YOU WILL GET WRONG RESULTS

Starting logview.jar with Java
</pre>



<div class="centro" style="width: 560px;"><a name="fig:job_monitor"></a><a name="149"></a>
  <img width="555" height="588" class="img-nav" alt="Condor Job Monitor" src="img3.png" />
  <div style="text-align: center; margin-top: 8px;">
    <strong>Figure 1: </strong>Condor Job Monitor
  </div>
</div>



<h2><a name="SECTION00052000000000000000">Removing a job from the queue</a></h2>

<p>
A job can be removed from the queue at any time by using the condor_rm
command. If the job that is being removed is currently running, the job is
killed without a checkpoint, and its queue entry is removed. 
</p>


<h2><a name="SECTION00053000000000000000">Changing the priority of jobs</a></h2>

<p>
In addition to the priorities assigned to each user, Condor also provides each
user with the capability of assigning priorities to each submitted job. These
job priorities are local to each queue and range from -20 to +20, with higher
values meaning better priority.
</p>

<p>
The default priority of a job is 0, but can be changed using the condor_prio
command. For example, to change the priority of a job to -15,
</p>


<pre>
%  condor_q raman

-- Submitter: froth.cs.wisc.edu : &lt;128.105.73.44:33847&gt; : froth.cs.wisc.edu
 ID      OWNER            SUBMITTED    CPU_USAGE ST PRI SIZE CMD               
 126.0   raman           4/11 15:06   0+00:00:00 I  0   0.3  hello             

1 jobs; 1 idle, 0 running, 0 held

%  condor_prio -p -15 126.0

%  condor_q raman

-- Submitter: froth.cs.wisc.edu : &lt;128.105.73.44:33847&gt; : froth.cs.wisc.edu
 ID      OWNER            SUBMITTED    CPU_USAGE ST PRI SIZE CMD               
 126.0   raman           4/11 15:06   0+00:00:00 I  -15 0.3  hello             

1 jobs; 1 idle, 0 running, 0 held
</pre>

<p>
It is important to note that these job priorities are completely different from
the user priorities assigned by Condor. Job priorities do not impact user
priorities. They are only a mechanism for the user to identify the relative
importance of jobs among all the jobs submitted by the user to that specific
queue.
</p>


<h2><a name="SECTION00054000000000000000">Why does the job not run?</a></h2>

<p>
Users sometimes find that their jobs do not run. There are several reasons why a
specific job does not run. These reasons include failed job or machine
constraints, bias due to preferences, insufficient priority, etc. Many of these
reasons can be diagnosed by using the -analyze option of condor_q. 
</p>


<pre>
[adrians@trevina ~]$ condor_submit myjob.submit 
Submitting job(s).
Logging submit event(s).
1 job(s) submitted to cluster 1.

[adrians@trevina ~]$ condor_q -analyze


-- Submitter: trevina.iac.es : &lt;161.72.81.178:39869&gt; : trevina.iac.es
 ID      OWNER            SUBMITTED     RUN_TIME ST PRI SIZE CMD               
---
001.000:  Run analysis summary.  Of 187 machines,
    187 are rejected by your job's requirements
      0 reject your job because of their own requirements
      0 match, but are serving users with a better priority in the pool
      0 match, but prefer another specific job despite its worse user-priority
      0 match, but will not currently preempt their existing job
      0 are available to run your job
        No successful match recorded.
        Last failed match: Thu Sep 16 12:38:09 2004
        Reason for last match failure: no match found

WARNING:  Be advised:
   No resources matched request's constraints
   Check the Requirements expression below:

Requirements = ((Memory &gt; 2147483647)) &amp;&amp; (Arch == "INTEL") &amp;&amp;
(OpSys == "LINUX") &amp;&amp; (Disk &gt;= DiskUsage) &amp;&amp;
(TARGET.FileSystemDomain == MY.FileSystemDomain)
</pre>

<p>
In this example we can see that the job 1.0 has problems to run: its
requirements are too demanding on RAM, and there are no machines that can cope
with this job.
</p>

<p>
While the analyzer can diagnose most common problems, there are some situations
that it cannot reliably detect due to the instantaneous and local nature of the
information it uses to detect the problem. Thus, it may be that the analyzer
reports that resources are available to service the request, but the job still
does not run. In most of these situations, the delay is transient, and the job
will run during the next negotiation cycle.
</p>

<p>
If the problem persists and the analyzer is unable to detect the situation, it
may be that the job begins to run but immediately terminates due to some
problem. Viewing the job's error and log files (specified in the submit command
file) may assist in tracking down the problem. If the cause is still unclear,
please contact your system administrator.
</p>


<h2><a name="SECTION00055000000000000000">Job Completion</a></h2>

<p>
When your Condor job completes (either through normal means or abnormal
termination by signal), Condor will remove it from the job queue (i.e., it will
no longer appear in the output of condor_q) and insert it into the job history
file. You can examine the job history file with the condor_history command. If
you specified a log file in your submit description file, then the job exit
status will be recorded there as well.</p>

<p>
By default, Condor will send you an email message when your job completes. You
can modify this behavior with the condor_submit ``notification'' command. The
message will include the exit status of your job (i.e., the argument your job
passed to the exit system call when it completed) or notification that your job
was killed by a signal. 
</p>


<h2><a name="SECTION00056000000000000000"></a><a name="ex_condor_history"></a>Exercise</h2>

<p>
Use the condor_history command to find all the jobs belonging to the user
``adrians'' that were removed from the queue before completing. The history of
submitted jobs is different for each machine, so for this you will have to be
connected to guinda.</p>

<p>
To get this right you should probably look at
</p>

<p>
<a name="tex2html9"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/4_1Condor_s_ClassAd.html">
  http://www.cs.wisc.edu/condor/manual/v7.0/4_1Condor_s_ClassAd.html</a>
</p>

<hr />

<!--Navigation Panel-->
<a name="tex2html197"  href="node6.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png" /></a> 
<a name="tex2html193"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png" /></a> 
<a name="tex2html187"  href="node4.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png" /></a> 
<a name="tex2html195"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png" /></a>  

<br />

<strong> Next:</strong> <a name="tex2html198"  href="node6.php">Standard Universe</a>
<strong> Up:</strong> <a name="tex2html194"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html188"  href="node4.php">Basic job submission</a>
 &nbsp;
<strong>  <a name="tex2html196"  href="node1.php">Contents</a></strong> 
<!--End of Navigation Panel-->

<address>
Angel M de Vicente
2004-10-25
</address>

</body>
</html>
