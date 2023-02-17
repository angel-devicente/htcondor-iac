<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Hands-on session with Condor: Workbook  - Standard Universe"; ?>
<?php $metadescription="Hands-on session with Condor: Workbook  - Standard Universe "; ?>

<?php include("header_course.php"); ?>


<!--Navigation Panel-->
<a name="tex2html216"  href="node7.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png" /></a> 
<a name="tex2html212"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png" /></a> 
<a name="tex2html206"  href="node5.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png" /></a> 
<a name="tex2html214"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png" /></a>  

<br />

<strong> Next:</strong> <a name="tex2html217"  href="node7.php">DAGMan</a>
<strong> Up:</strong> <a name="tex2html213"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html207"  href="node5.php">Managing jobs</a>
 &nbsp; 
<strong>  <a name="tex2html215"  href="node1.php">Contents</a></strong> 
<br />
<br />
<!--End of Navigation Panel-->

<!--Table of Child-Links-->
<a name="CHILD_LINKS"><strong>Subsections</strong></a>

<ul>
<li><ul>
<li><a name="tex2html218"  href="node6.php#SECTION00060100000000000000">Example</a>
<ul>
<li><a name="tex2html219"  href="node6.php#SECTION00060110000000000000">Our very useful program!</a>
<li><a name="tex2html220"  href="node6.php#SECTION00060120000000000000">Submission file</a>
<li><a name="tex2html221"  href="node6.php#SECTION00060130000000000000">Running the code</a>
</ul>
</ul>
</ul>
<!--End of Table of Child-Links-->

<hr />

<h1 ><a name="SECTION00060000000000000000">Standard Universe</a></h1>

<p>In the standard universe, Condor provides checkpointing and remote system
calls. These features make a job more reliable and allow it uniform access to
resources from anywhere in the pool. To prepare a program as a standard universe
job, it must be relinked with condor_compile. Most programs can be prepared as
a standard universe job, but there are a few restrictions.</p>

<p>
Condor checkpoints a job at regular intervals. A checkpoint image is essentially
a snapshot of the current state of a job. If a job must be migrated from one
machine to another, Condor makes a checkpoint image, copies the image to the new
machine, and restarts the job continuing the job from where it left off. If a
machine should crash or fail while it is running a job, Condor can restart the
job on a new machine using the most recent checkpoint image. In this way, jobs
can run for months or years even in the face of occasional computer failures.
</p>

<p>
To convert your program into a standard universe job, you must use condor_
compile to relink it with the Condor libraries. Put condor_compile in front of
your usual link command. You do not need to modify the program's source code,
but you do need access to the unlinked object files. A commercial program that
is packaged as a single executable file cannot be converted into a standard
universe job.
</p>

<p>
For example, if you would have linked the job by executing:
</p>

<pre>
% cc main.o tools.o -o program
</pre>

<p>
Then, relink the job for Condor with:
</p>


<pre>
% condor_compile cc main.o tools.o -o program
</pre>

<p>
There are a few restrictions on standard universe jobs. Before you plan to run a
standard universe job, you should make sure that you check out these restrictions
 in section 2.4.1.1 of the manual page</p>

<p>
http://research.iac.es/sieinvens/SINFIN/Condor/v6.6/2_4Road_map_Running.html.
</p>

<p>
At the IAC, we have opted to only do a partial install of
condor_compile. Because of this you are restricted to using condor_compile
with one of these programs:
</p>



<ul>
<li>cc (the system C compiler) </li>
<li>acc (ANSI C compiler, on Sun systems) </li>
<li>c89 (POSIX compliant C compiler, on some systems) </li>
<li>CC (the system C++ compiler) </li>
<li>f77 (the system FORTRAN compiler) </li>
<li>gcc (the GNU C compiler) </li>
<li>g++ (the GNU C++ compiler) </li>
<li>g77 (the GNU FORTRAN compiler) </li>
<li>ld (the system linker)  </li>
<li>f90 (the system FORTRAN 90 compiler), only supported on Solaris and Digital Unix. </li>
</ul>

<p>

<h2><a name="SECTION00060100000000000000">Example</a></h2>

<h3><a name="SECTION00060110000000000000">Our very useful program!</a></h3>

<p>
This program will just loop. In a fast machine it should take about three hours
to finish.</p>


<pre>
#include &lt;stdio.h&gt;

int main (int argc, char *argv[])
{
  long this_number, other_number;

this_number = 1;

 while(this_number &lt; 10000000) {
   other_number = 1;

   while(other_number &lt; 100000) {
   if (!(this_number % 1000) &amp;&amp; (other_number == 1))
     printf("%ld\n", this_number);
   other_number = other_number + 1;
   }
   this_number = this_number + 1;
 }
 return 0;
}
</pre>



<h3><a name="SECTION00060120000000000000">Submission file</a></h3>

<pre>
########################################################
##
## Example Standard Universe
##
## File: submit_looping_std
##
########################################################

executable = looping_std_solaris_stripped
universe = standard
Requirements = Arch == "SUN4u" &amp;&amp; OpSys == "SOLARIS29"

Initialdir = /net/guinda/scratch/angelv/Condor-Course/
output = std_universe.out
error =  std_universe.err
log =    std_universe.log
queue
</pre>



<h3><a name="SECTION00060130000000000000">Running the code</a></h3>

<pre>
naranja(97)~/SCRIPTS/CONDOR/&gt; condor_compile cc -o looping_std_solaris looping.c 
LINKING FOR CONDOR : /usr/ccs/bin/ld
/opt/SUNWspro/SC5.0/lib/crti.o /usr/pkg/condor/condor-6.6.3/lib/condor_rt0.o
/opt/SUNWspro/SC5.0/lib/values-xa.o -o looping_std_solaris looping.o -Y
P,/opt/SUNWspro/SC5.0/lib:/usr/ccs/lib: /usr/lib -Qy
/usr/pkg/condor/condor-6.6.3/lib/libcondorzsyscall.a
/usr/pkg/condor/condor-6.6.3/lib/libz.a -Bdynamic -lsocket -lnsl -lc
/opt/SUNWspro/SC5.0/lib/crtn.o
/usr/pkg/condor/condor-6.6.3/lib/libcondorc++support.a


naranja(102)~/SCRIPTS/CONDOR/&gt; cp looping_std_solaris looping_std_solaris_stripped

naranja(103)~/SCRIPTS/CONDOR/&gt; strip looping_std_solaris_stripped

naranja(107)~/SCRIPTS/CONDOR/&gt; ls -l
total 41728
-rwxr-xr-x   1 angelv   other       4673 Sep 29 17:48 looping
-rw-r--r--   1 angelv   other        382 Sep 29 17:47 looping.c
-rwxr-xr-x   1 angelv   other    12327189 Sep 29 17:53 looping_std_linux
-rwxr-xr-x   1 angelv   other    1333784 Sep 29 17:56 looping_std_linux_stripped
-rwxr-xr-x   1 angelv   other    5678624 Sep 29 17:54 looping_std_solaris
-rwxr-xr-x   1 angelv   other     678676 Sep 29 17:55 looping_std_solaris_stripped
-rw-r--r--   1 angelv   other        138 May 26 16:52 submit_looping_std
naranja(108)~/SCRIPTS/CONDOR/&gt;

naranja(106)~/SCRIPTS/CONDOR/&gt; ./looping_std_solaris_stripped
Condor: Notice: Will checkpoint to ./looping_std_solaris_stripped.ckpt
Condor: Notice: Remote system calls disabled.
1000
2000
[...]
naranja(107)~/SCRIPTS/CONDOR/&gt;

-------------------------------------------------------------------------

naranja(107)~/SCRIPTS/CONDOR/&gt; cat /scratch/angelv/Condor-Course/std_universe.log

000 (188.000.000) 09/29 18:24:30 Job submitted from host: &lt;161.72.81.187:51962&gt;
...
001 (188.000.000) 09/29 18:25:16 Job executing on host: &lt;161.72.65.35:37169&gt;
...
006 (188.000.000) 09/29 18:27:22 Image size of job updated: 2961
...
004 (188.000.000) 09/29 18:27:30 Job was evicted.
        (1) Job was checkpointed.
                Usr 0 00:02:03, Sys 0 00:00:00  -  Run Remote Usage
                Usr 0 00:00:00, Sys 0 00:00:00  -  Run Local Usage
        2353744  -  Run Bytes Sent By Job
        680030  -  Run Bytes Received By Job
...
001 (188.000.000) 09/29 18:31:21 Job executing on host: &lt;161.72.65.35:37169&gt;
...
004 (188.000.000) 09/29 18:33:31 Job was evicted.
        (1) Job was checkpointed.
                Usr 0 00:01:56, Sys 0 00:00:00  -  Run Remote Usage
                Usr 0 00:00:00, Sys 0 00:00:00  -  Run Local Usage
        2353400  -  Run Bytes Sent By Job
        3032210  -  Run Bytes Received By Job
...
001 (188.000.000) 09/29 18:42:26 Job executing on host: &lt;161.72.65.11:44853&gt;
...
004 (188.000.000) 09/29 20:05:02 Job was evicted.
        (1) Job was checkpointed.
                Usr 0 01:20:57, Sys 0 00:00:00  -  Run Remote Usage
                Usr 0 00:00:00, Sys 0 00:00:00  -  Run Local Usage
        2353400  -  Run Bytes Sent By Job
        3032146  -  Run Bytes Received By Job
...
001 (188.000.000) 09/29 20:13:26 Job executing on host: &lt;161.72.69.18:45267&gt;
...
006 (188.000.000) 09/30 02:13:41 Image size of job updated: 2993
...
003 (188.000.000) 09/30 02:14:19 Job was checkpointed.
        Usr 0 05:57:16, Sys 0 00:00:00  -  Run Remote Usage
                Usr 0 00:00:00, Sys 0 00:00:00  -  Run Local Usage
...
003 (188.000.000) 09/30 08:14:11 Job was checkpointed.
        Usr 0 11:53:43, Sys 0 00:00:00  -  Run Remote Usage
                Usr 0 00:00:00, Sys 0 00:00:00  -  Run Local Usage
...

[...]

...
001 (188.000.000) 09/30 11:58:17 Job executing on host: &lt;161.72.66.25:61440&gt;
...


[angelv@guinda Condor-Course]$ condor_q

-- Submitter: guinda.iac.es : &lt;161.72.81.187:51962&gt; : guinda.iac.es
 ID      OWNER            SUBMITTED     RUN_TIME ST PRI SIZE CMD
 188.0   angelv          9/29 18:24   0+18:26:51 R  0   2.9  looping_std_solari

1 jobs; 0 idle, 1 running, 0 held


[angelv@guinda Condor-Course]$ condor_q -l 188.0
-- Submitter: guinda.iac.es : &lt;161.72.81.187:51962&gt; : guinda.iac.es
MyType = "Job"
TargetType = "Machine"
ClusterId = 188
QDate = 1096478669
[...]
Iwd = "/net/guinda/scratch/angelv/Condor-Course/"
JobUniverse = 1
Cmd = "/home/angelv/Condor-Course/Standard_Universe/looping_std_solaris_stripped"
[...]
Requirements = (Arch == "SUN4u" &amp;&amp; OpSys == "SOLARIS29") &amp;&amp; 
               ((CkptArch == Arch) || (CkptArch =?= UNDEFINED)) &amp;&amp; 
               ((CkptOpSys == OpSys) || (CkptOpSys =?= UNDEFINED)) &amp;&amp; 
               (Disk &gt;= DiskUsage) &amp;&amp; ((Memory * 1024) &gt;= ImageSize)
[...]
TotalSuspensions = 6
CumulativeSuspensionTime = 2853
[...]
NumCkpts = 8
NumRestarts = 13
CkptArch = "SUN4u"
CkptOpSys = "SOLARIS29"
RemoteWallClockTime = 61103.000000
LastRemoteHost = "avestruz.ll.iac.es"
[...]
RemoteHost = "gata.ll.iac.es"
RemoteVirtualMachineID = 1
ShadowBday = 1096541885
JobLastStartDate = 1096539606
JobCurrentStartDate = 1096541885
JobRunCount = 7
WallClockCheckpoint = 4242
ServerTime = 1096547198

[angelv@guinda Condor-Course]$
</pre>

<hr />
<!--Navigation Panel-->
<a name="tex2html216"  href="node7.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png"></a> 
<a name="tex2html212"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png"></a> 
<a name="tex2html206"  href="node5.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png"></a> 
<a name="tex2html214"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png"></a>  

<br />

<strong> Next:</strong> <a name="tex2html217"  href="node7.php">DAGMan</a>
<strong> Up:</strong> <a name="tex2html213"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html207"  href="node5.php">Managing jobs</a>
 <strong>  <a name="tex2html215"  href="node1.php">Contents</a></strong> 
<!--End of Navigation Panel-->

<address>
Angel M de Vicente
2004-10-25
</address>

</body>
</html>
