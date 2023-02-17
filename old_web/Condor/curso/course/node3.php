<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Hands-on session with Condor: Workbook  - Introduction"; ?>
<?php $metadescription="Hands-on session with Condor: Workbook  - Introduction"; ?>

<?php include("header_course.php"); ?>


<!--Navigation Panel-->
<a name="tex2html144"  href="node4.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png" /></a> 
<a name="tex2html140"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png" /></a> 
<a name="tex2html134"  href="node2.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png" /></a> 
<a name="tex2html142"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png" /></a>  
<br />

<strong> Next:</strong> <a name="tex2html145"  href="node4.php">Basic job submission</a>
<strong> Up:</strong> <a name="tex2html141"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html135"  href="node2.php">Preliminary</a>
 &nbsp; <strong>  <a name="tex2html143"  href="node1.php">Contents</a></strong> 
<br />
<br />
<!--End of Navigation Panel-->

<!--Table of Child-Links-->
<a name="CHILD_LINKS"><strong>Subsections</strong></a>

<ul>
<li><a name="tex2html146"  href="node3.php#SECTION00031000000000000000">Getting to know the IAC Condor Pool</a>
<ul>
<li><a name="tex2html147"  href="node3.php#SECTION00031100000000000000">CondorView statistics</a>
<li><a name="tex2html148"  href="node3.php#SECTION00031200000000000000">The  condor_status command</a>
<ul>
<li><a name="tex2html149"  href="node3.php#SECTION00031210000000000000">The concept of matchmaking: ads in Condor.</a>
<li><a name="tex2html150"  href="node3.php#SECTION00031220000000000000">Inspecting Machine ClassAds with condor_status.</a>
</ul>
<li><a name="tex2html151"  href="node3.php#SECTION00031300000000000000">Exercises</a>
</ul></ul>
<!--End of Table of Child-Links-->

<hr />

<h1 ><a name="SECTION00030000000000000000">Introduction</a></h1>

<p>
Condor is developed by the Condor Team at the University of Wisconsin-Madison
(UW-Madison), and was first installed as a production system in the UW-Madison
Computer Sciences department more than 10 years ago.
</p>

<p>
In a nutshell, Condor is a specialized batch system for managing
compute-intensive jobs. Like most batch systems, Condor provides a queuing
mechanism, scheduling policy, priority scheme, and resource
classifications. Users submit their compute jobs to Condor, Condor puts the jobs
in a queue, runs them, and then informs the user as to the result.
</p>

<p>
Batch systems normally operate only with dedicated machines. Often termed
compute servers, these dedicated machines are typically owned by one
organization and dedicated to the sole purpose of running compute jobs. Condor
can schedule jobs on dedicated machines. But unlike traditional batch systems,
Condor is also designed to effectively utilize non-dedicated machines to run
jobs. By being told to only run compute jobs on machines which are currently not
being used (no keyboard activity, no load average, no active telnet users, etc),
Condor can effectively harness otherwise idle machines throughout a pool of
machines. This is important because often times the amount of compute power
represented by the aggregate total of all the non-dedicated desktop workstations
sitting on people's desks throughout the organization is far greater than the
compute power of a dedicated central resource.
</p>

<h2><a name="SECTION00031000000000000000">Getting to know the IAC Condor Pool</a></h2>

<p>
Before we run anything with Condor, we need to find out what resources are available
at our pool. For this, we can use CondorView to view historical data, or
condor_status to find about the current state of our pool.
</p>

<h3><a name="SECTION00031100000000000000">CondorView statistics</a></h3>

<p>
This is a very easy-to-use web application that let's you see through time how many machines were in our
pool, how many were being used by Condor, who submitted jobs to the
pool, etc.</p>

<p>
At present the CondorView interface is at
<a name="tex2html3"  href="http://duraznero/">http://duraznero/</a>,
accessible through the IAC Condor page at 
<a name="tex2html4"  
  href="http://research.iac.es/sieinvens/SINFIN/Condor/index.php">http://research.iac.es/sieinvens/SINFIN/Condor/index.php</a>.
</p>



<h3><a name="SECTION00031200000000000000">The  condor_status command</a></h3>



<h4><a name="SECTION00031210000000000000">The concept of matchmaking: ads in Condor.</a></h4>

<p>
Before you learn how to submit a job, it is important to understand how
Condor allocates resources. Condor simplifies job submission by acting as a
matchmaker of ClassAds. Condor's ClassAds are analogous to the classified
advertising section of the newspaper. Sellers advertise specifics about what
they have to sell, hoping to attract a buyer. Buyers may advertise specifics
about what they wish to purchase. Both buyers and sellers list constraints that
need to be satisfied. In Condor, users submitting jobs can be thought of as
buyers of compute resources and machine owners are sellers.
</p>

<p>
All machines in a Condor pool advertise their attributes, such as available RAM
memory, CPU type and speed, virtual memory size, current load average, along
with other static and dynamic properties. This machine ClassAd also advertises
under what conditions it is willing to run a Condor job and what type of job it
would prefer. You may advertise that your machine is only willing to run jobs at
night and when there is no keyboard activity on your machine. In addition, you
may advertise a preference (rank) for running jobs submitted by you or one of
your co-workers.
</p>

<p>
Likewise, when submitting a job, you specify a ClassAd with your requirements
and preferences. The ClassAd includes the type of machine you wish to use. For
instance, perhaps you are looking for the fastest floating point performance
available. You want Condor to rank available machines based upon floating point
performance. Or, perhaps you care only that the machine has a minimum of 128
Mbytes of RAM. 
</p>

<p>
Condor plays the role of a matchmaker by continuously reading all the job
ClassAds and all the machine ClassAds, matching and ranking job ads with machine
ads. Condor makes certain that all requirements in both ClassAds are satisfied.
</p>



<h4><a name="SECTION00031220000000000000">Inspecting Machine ClassAds with condor_status.</a></h4>

<p>
Once Condor is installed, you will get a feel for what a machine ClassAd does by
trying the condor_status command. 
</p>

<pre>
naranja(67)~/Condor-Course/dagman1&gt; condor_status

Name          OpSys       Arch   State      Activity   LoadAv Mem   ActvtyTime

canistel.iac. LINUX       INTEL  Claimed    Suspended  0.800   500  0+00:00:04
codorniz.iac. LINUX       INTEL  Owner      Idle       5.000   500  0+19:25:20
correhuela.ia LINUX       INTEL  Claimed    Suspended  0.830  1005  0+00:00:04
drosera.iac.e LINUX       INTEL  Claimed    Suspended  0.830   248  0+00:00:04
paraguayo.iac LINUX       INTEL  Owner      Idle       0.000   500  0+00:50:04
resines.ll.ia LINUX       INTEL  Owner      Idle       3.030  1005  0+04:13:10
temple.ll.iac LINUX       INTEL  Owner      Idle       2.000   500  0+04:16:09
abeto.iac.es  SOLARIS29   SUN4u  Claimed    Suspended  0.420   256  0+00:02:00
aguila.iac.es SOLARIS29   SUN4u  Owner      Idle       0.050   640  0+01:18:55
ajedrea.iac.e SOLARIS29   SUN4u  Claimed    Busy       1.000   512  0+19:00:42
albatros.iac. SOLARIS29   SUN4u  Claimed    Suspended  0.090   640  0+00:00:04
anchoa.ll.iac SOLARIS29   SUN4u  Claimed    Busy       1.000   256  0+19:13:47
ansar.iac.es  SOLARIS29   SUN4u  Claimed    Busy       1.000   576  0+15:35:16
asno.iac.es   SOLARIS29   SUN4u  Claimed    Busy       1.020   256  0+01:00:53
avestruz.iac. SOLARIS29   SUN4u  Claimed    Busy       0.990   128  0+17:51:11
[...]

                     Machines Owner Claimed Unclaimed Matched Preempting

         INTEL/LINUX        7     4       3         0       0          0
     SUN4u/SOLARIS29       94    26      68         0       0          0

               Total      101    30      71         0       0          0
naranja(68)~/Condor-Course/dagman1&gt;
</pre>

<p>
But there is much more to condor_status...Here there are some useful options
of the condor_status command:
</p>



<ul>
<li>Show only machines which are willing to run jobs now: <pre>condor_status -available
</pre>
</li>
<li>Show only machines which are currently running jobs: <pre>condor_status -run
</pre>
</li>
<li>Show all the machines in the pool sorted by the amount of memory they
  have: <pre>condor_status -sort Memory
</pre>
</li>
<li>List the machine ClassAds for a given machines in the pool:
  <pre>condor_status -l codorniz.iac.es 

For example:

naranja(68)~/Condor-Course/dagman1&gt; condor_status -l naranja.iac.es
MyType = "Machine"
TargetType = "Job"
Name = "naranja.iac.es"
Machine = "naranja.iac.es"
Rank = 0.000000
CpuBusy = ((LoadAvg - CondorLoadAvg) &gt;= 0.500000)
COLLECTOR_HOST_STRING = "codorniz"
CondorVersion = "$CondorVersion: 6.6.3 Mar 29 2004 $"
CondorPlatform = "$CondorPlatform: SUN4X-SOLARIS29 $"
VirtualMachineID = 1
ExecutableSize = 284
JobUniverse = 5
NiceUser = FALSE
ImageSize = 8304
VirtualMemory = 384888
Disk = 30672106
CondorLoadAvg = 0.940000
LoadAvg = 0.940000
KeyboardIdle = 1
ConsoleIdle = 60233
Memory = 640
Cpus = 1
StartdIpAddr = "&lt;161.72.64.97:62302&gt;"
Arch = "SUN4u"
OpSys = "SOLARIS29"
UidDomain = "iac.es"
FileSystemDomain = "iac.es"
Subnet = "161.72.64"
HasIOProxy = TRUE
TotalVirtualMemory = 384888
TotalDisk = 30672106
KFlops = 102016
Mips = 601
LastBenchmark = 1096346012
TotalLoadAvg = 0.940000
TotalCondorLoadAvg = 0.940000
ClockMin = 671
ClockDay = 2
TotalVirtualMachines = 1
HasFileTransfer = TRUE
HasMPI = TRUE
HasJICLocalConfig = TRUE
HasJICLocalStdin = TRUE
JavaVendor = "Sun Microsystems Inc."
JavaVersion = "1.4.1_01a"
JavaMFlops = 15.282580
HasJava = TRUE
HasRemoteSyscalls = TRUE
HasCheckpointing = TRUE
StarterAbilityList = "HasFileTransfer,HasMPI,HasJICLocalConfig,HasJICLocalStdin,
                      HasJava,HasRemoteSyscalls,HasCheckpointing"
CpuBusyTime = 0
CpuIsBusy = FALSE
State = "Claimed"
EnteredCurrentState = 1096364649
Activity = "Suspended"
EnteredCurrentActivity = 1096366304
Start = ((KeyboardIdle &gt; 15 * 60) &amp;&amp; (((LoadAvg - CondorLoadAvg) &lt;= 0.300000) || 
                                       (State != "Unclaimed" &amp;&amp; State != "Owner")))
Requirements = START
CurrentRank = 0.000000
RemoteUser = "plopez@iac.es"
RemoteOwner = "plopez@iac.es"
ClientMachine = "naranja.iac.es"
JobId = "3362.0"
JobStart = 1096364653

[...]

DaemonStartTime = 1096054048
UpdateSequenceNumber = 1087
MyAddress = "&lt;161.72.64.97:62302&gt;"
LastHeardFrom = 1096366308
UpdatesTotal = 247
UpdatesSequenced = 246
UpdatesLost = 3
UpdatesHistory = "0x04400000000000000000000000000000"


naranja(69)~/Condor-Course/dagman1&gt;
</pre>


</li>
</ul>

<p>
Some of the listed attributes are used by Condor for scheduling. Other
attributes are for information purposes. An important point is that any of the
attributes in a machine ad can be utilized at job submission time as part of a
request or preference on what machine to use. Additional attributes can be
easily added. For example, your site administrator can add a physical location
attribute to your machine ClassAds.
</p>


<h3><a name="SECTION00031300000000000000"></a>
<a name="ex_condor_status"></a>
<br />
Exercises
</h3>
<p>Refer to the condor_status command reference page  in the Condor Manual to find out how to obtain the
following information:</p>



<ol>
<li>A list of all the Linux machines available, sorted by their amount
  of memory.
</li>
<li>A list of the java version installed in all the Java-capable Solaris
  machines (printed in the format given below), using only one condor_status command:

<p>
<pre>
The machine toro.iac.es has Java Version: 1.4.1_01a
The machine vibora.iac.es has Java Version: 1.4.1_01a
The machine viola.iac.es has Java Version: 1.4.1_01a
The machine zorro.ll.iac.es has Java Version: 1.4.1_01a
[...]
</pre>

<p>
</li>
</ol>


<hr />
<p>
<!--Navigation Panel-->
<a name="tex2html144"  href="node4.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png"></a> 
<a name="tex2html140"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png"></a> 
<a name="tex2html134"  href="node2.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png"></a> 
<a name="tex2html142"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png"></a>  

<br />

<strong> Next:</strong> <a name="tex2html145"  href="node4.php">Basic job submission</a>
<strong> Up:</strong> <a name="tex2html141"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html135"  href="node2.php">Preliminary</a>
 &nbsp; <strong>  <a name="tex2html143"  href="node1.php">Contents</a></strong> 
<!--End of Navigation Panel-->
</p>

<address>
Angel M de Vicente
2004-10-25
</address>
</body>
</html>
