<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Hands-on session with Condor: Workbook  - DAGMan"; ?>
<?php $metadescription="Hands-on session with Condor: Workbook  - DAGMan "; ?>

<?php include("header_course.php"); ?>


<!--Navigation Panel-->
<a name="tex2html232"  href="node8.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png" /></a> 
<a name="tex2html228"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png" /></a> 
<a name="tex2html222"  href="node6.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png" /></a> 
<a name="tex2html230" href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png" /></a>  

<br />

<strong> Next:</strong> <a name="tex2html233"  href="node8.php">Last remarks</a>
<strong> Up:</strong> <a name="tex2html229"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html223"  href="node6.php">Standard Universe</a>
 &nbsp; 
<strong>  <a name="tex2html231"  href="node1.php">Contents</a></strong> 
<br />
<br />
<!--End of Navigation Panel-->

<!--Table of Child-Links-->
<a name="CHILD_LINKS"><strong>Subsections</strong></a>

<ul>
<li><a name="tex2html234"  href="node7.php#SECTION00071000000000000000">Basic DAGs</a>
<ul><li><a name="tex2html235"  href="node7.php#SECTION00071100000000000000">Example</a>
<ul>
<li><a name="tex2html236"  href="node7.php#SECTION00071110000000000000">Submission file</a>
<li><a name="tex2html237"  href="node7.php#SECTION00071120000000000000">Running the code</a>
</ul>
<li><a name="tex2html238"  href="node7.php#SECTION00071200000000000000">Exercise</a>
</ul>

<br />
<li><a name="tex2html239"  href="node7.php#SECTION00072000000000000000">Let's go for the real thing...</a>
<ul>
<li><a name="tex2html240"  href="node7.php#SECTION00072100000000000000">DAGs with PRE and POST processing
</a>
<li><a name="tex2html241"  href="node7.php#SECTION00072200000000000000">Job recovery: the rescue DAG</a>
<li><a name="tex2html242"  href="node7.php#SECTION00072300000000000000">Macros in DAG files</a>
</ul>
<br />
<li><a name="tex2html243"  href="node7.php#SECTION00073000000000000000">Exercises</a>
</ul>

<!--End of Table of Child-Links-->
<hr />

<h1><a name="SECTION00070000000000000000">DAGMan</a></h1>

<p>
A directed acyclic graph (DAG) can be used to represent a set of programs where
the input, output, or execution of one or more programs is dependent on one or
more other programs. The programs are nodes (vertices) in the graph, and the
edges (arcs) identify the dependencies. Condor finds machines for the execution
of programs, but it does not schedule programs (jobs) based on dependencies. The
Directed Acyclic Graph Manager (DAGMan) is a meta-scheduler for Condor
jobs. DAGMan submits jobs to Condor in an order represented by a DAG and
processes the results. An input file defined prior to submission describes the
DAG, and a Condor submit description file for each program in the DAG is used by
Condor.</p>

<p>
Each node (program) in the DAG specifies a Condor submit description file. As
DAGMan submits jobs to Condor, it monitors the Condor log file(s) to enforce the
ordering required for the DAG. The DAG itself is defined by the contents of a
DAGMan input file. DAGMan is responsible for scheduling, recovery, and reporting
for the set of programs submitted to Condor.</p>

<p>
One limitation exists: each Condor submit description file must submit only one
job. There may not be multiple queue commands, or DAGMan will fail. This
requirement exists to enforce the requirements of a well-defined DAG. If each
node of the DAG could cause the submission of multiple Condor jobs, then it
would violate the definition of a DAG.</p>

<p>
DAGMan no longer requires that all jobs specify the same log file. However, if
the DAG contains a very large number of jobs, each specifying its own log file,
performance may suffer. Therefore, if the DAG contains a large number of jobs,
it is best to have all of the jobs use the same log file. DAGMan enforces the
dependencies within a DAG using the events recorded in the log file(s) produced
by job submission to Condor.</p>



<h2><a name="SECTION00071000000000000000">Basic DAGs</a></h2> 



<h3><a name="SECTION00071100000000000000">Example</a></h3>

<h4><a name="SECTION00071110000000000000">Submission file</a></h4>


<pre>
# Filename: diamond.dag
#
Job  A  A.condor 
Job  B  B.condor 
Job  C  C.condor
Job  D  D.condor
PARENT A CHILD B C
PARENT B C CHILD D

--------------------------------------------

########################################################
##
## A.condor
##
## Simple condor job description file
##
########################################################

executable = basic.sh
universe = vanilla
output = A.out
error =  A.err
log =    dagman_example.log
queue

----------------------------------------

#!/bin/sh

# Filename: basic.sh
#

echo Executed on `uname -n` at `date`
</pre>



<h4><a name="SECTION00071120000000000000">Running the code</a></h4>

<pre>
naranja(27)~/Condor-Course/dagman1&gt; condor_submit_dag diamond.dag

Checking your DAG input file and all submit files it references.
This might take a while...
Done.
-----------------------------------------------------------------------
File for submitting this DAG to Condor           : diamond.dag.condor.sub
Log of DAGMan debugging messages                 : diamond.dag.dagman.out
Log of Condor library debug messages             : diamond.dag.lib.out
Log of the life of condor_dagman itself          : diamond.dag.dagman.log

Condor Log file for all Condor jobs of this DAG: dagman_example.log
Submitting job(s).
Logging submit event(s).
1 job(s) submitted to cluster 3548.
-----------------------------------------------------------------------
naranja(28)~/Condor-Course/dagman1&gt;


naranja(63)~/Condor-Course/dagman1&gt; condor_q -dag angelv


-- Submitter: naranja.iac.es : &lt;161.72.64.97:49674&gt; : naranja.iac.es
 ID      OWNER/NODENAME   SUBMITTED     RUN_TIME ST PRI SIZE CMD
3548.0   angelv          9/28 09:55   0+00:00:11 R  0   4.0  condor_dagman -f -
3549.0    |-A            9/28 09:55   0+00:00:00 I  0   0.0  basic.sh

2 jobs; 1 idle, 1 running, 0 held
naranja(64)~/Condor-Course/dagman1&gt;



naranja(40)~/Condor-Course/dagman1&gt; condor_q angelv


-- Submitter: naranja.iac.es : &lt;161.72.64.97:49674&gt; : naranja.iac.es
 ID      OWNER            SUBMITTED     RUN_TIME ST PRI SIZE CMD

0 jobs; 0 idle, 0 running, 0 held
naranja(41)~/Condor-Course/dagman1&gt;


naranja(43)~/Condor-Course/dagman1&gt; cat A.out
Executed on albatros at Tue Sep 28 10:00:45 WEST 2004
naranja(44)~/Condor-Course/dagman1&gt; cat B.out
Executed on albatros at Tue Sep 28 10:01:51 WEST 2004
naranja(45)~/Condor-Course/dagman1&gt; cat C.out
Executed on asno at Tue Sep 28 10:01:51 WEST 2004
naranja(46)~/Condor-Course/dagman1&gt; cat D.out
Executed on albatros at Tue Sep 28 10:02:35 WEST 2004
naranja(47)~/Condor-Course/dagman1&gt;
</pre>



<h3><a name="SECTION00071200000000000000"></a><a name="ex_basic_dag"></a>Exercise</h3>

<p>
In the previous example, all the jobs could actually run in parallel, since no
job depends on the output of any other. Your task for this exercise is to modify
the jobs, the submission files, etc. as follows: job A should create two files,
B.input and C.input containing a line of text. Job B reads B.input and generates
B.output where the text in B.input is modified in any way you want. Likewise for
job C. Job D should take the text in B.output and C.output and print to standard
output the contents of both files. Run it and verify that all is working
according to plan.</p>



<h2><a name="SECTION00072000000000000000">Let's go for the real thing...</a></h2>



<h3><a name="SECTION00072100000000000000">DAGs with PRE and POST processing</a></h3>

<p>
In a DAGMan you can also specify processing that is done either before a program
within the DAG is submitted to Condor for execution or after a program within
the DAG completes its execution. Processing done before a program is submitted
to Condor is called a PRE script. Processing done after a program successfully
completes its execution under Condor is called a POST script. A node in the DAG
is comprised of the program together with PRE and/or POST scripts. The
dependencies in the DAG are enforced based on nodes.</p>

<p>
DAGMan takes note of the exit value of the scripts as well as the program. If
the PRE script fails (exit value != 0), then neither the program nor the POST
script runs, and the node is marked as failed.</p>

<p>
If the PRE script succeeds, the program is submitted to Condor. If the program
fails and there is no POST script, the DAG node is marked as failed. An exit
value not equal to 0 indicates program failure. It is therefore important that
the program returns the exit value 0 to indicate the program did not fail.</p>

<p>
If the program fails and there is a POST script, node failure is determined by
the exit value of the POST script. A failing value from the POST script marks
the node as failed. A succeeding value from the POST script (even with a failed
program) marks the node as successful. Therefore, the POST script may need to
consider the return value from the program.</p>

<p>
By default, the POST script is run regardless of the program's return value. To
prevent POST scripts from running after failed jobs, pass the -NoPostFail
argument to condor_ submit_dag.
</p>

<p>
A node not marked as failed at any point is successful.
</p>

<p>
Two variables are available to ease script writing. The $JOB variable evaluates
to JobName. For POST scripts, the $RETURN variable evaluates to the return value
of the program. The variables may be placed anywhere within the arguments.
</p>


<h3><a name="SECTION00072200000000000000">Job recovery: the rescue DAG</a></h3>

<p>
DAGMan can help with the resubmission of uncompleted portions of a DAG when one
or more nodes resulted in failure. If any node in the DAG fails, the remainder
of the DAG is continued until no more forward progress can be made based on the
DAG's dependencies. At this point, DAGMan produces a file called a Rescue DAG.
</p>

<p>
The Rescue DAG is a DAG input file, functionally the same as the original DAG
file. It additionally contains indication of successfully completed nodes using
the DONE option in the input description file. If the DAG is resubmitted using
this Rescue DAG input file, the nodes marked as completed will not be
re-executed.
</p>


<h3><a name="SECTION00072300000000000000">Macros in DAG files</a></h3>

<p>
In a DAG input file there is a method for defining a macro to be placed into the
submit description files. It can be used to dramatically reduce the number of
submit description files needed for a DAG. In the case where the submit
description file for each node varies only in file naming, the use of a
substitution macro within the submit description file allows the use of a single
submit description file. Note that the node output log file currently cannot be
specified using a macro passed from the DAG.
</p>

<p>
The example uses a single submit description file in the DAG input file, and
uses the Vars entry to name output files.
</p>


<pre>
# submit description file called:  theonefile.sub
executable   = progX
output       = \$(outfilename)
error        = error.\$(outfilename)
universe     = standard
queue
</pre>

<p>
The relevant portion of the DAG input file appears as
</p>


<pre>
JOB A theonefile.sub
JOB B theonefile.sub
JOB C theonefile.sub

VARS A outfilename="A"
VARS B outfilename="B"
VARS C outfilename="C"
</pre>

<p>
For a DAG like this one with thousands of nodes, being able to write and
maintain a single submit description file and a single, yet more complex, DAG
input file is preferable.</p>



<h2><a name="SECTION00073000000000000000"></a><a name="ex_advanced_dag"></a>Exercises</h2>

<p>
For this exercise we are going to modify the files created for the exercise
given in section <a href="#ex_basic_dag">6.1.2</a> as follows. 
</p>


<ol>
<li>In the previous exercise a lot of files were created, some of which were
only temporary ones. We will use the POST arguments to make use of
scripts that will delete these temporary files, and also create a script that
will compress the final output file.
</li>
<li>Once you have it working, write a PRE script for the node C so that it will
  fail. Try to run it and see how a rescue file is created. Edit the created
  rescue file, so that we don't invoke again the PRE script. Resubmit using the
  rescue DAG file and see what happens...
</li>
</ol>


<hr />
<!--Navigation Panel-->
<a name="tex2html232"  href="node8.php">
<img width="37" height="24" class="img-nav" alt="next"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/next.png"></a> 
<a name="tex2html228"  href="course.php">
<img width="26" height="24" class="img-nav" alt="up"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/up.png"></a> 
<a name="tex2html222"  href="node6.php">
<img width="63" height="24" class="img-nav" alt="previous"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/previous.png"></a> 
<a name="tex2html230"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents"
 src="http://www.physionet.org/physiotools/rcvsim/doc/icons/contents.png"></a>  
<br />

<strong> Next:</strong> <a name="tex2html233"  href="node8.php">Last remarks</a>
<strong> Up:</strong> <a name="tex2html229"  href="course.php">Hands-on session with Condor:</a>
<strong> Previous:</strong> <a name="tex2html223"  href="node6.php">Standard Universe</a>
 &nbsp; 
<strong><a name="tex2html231"  href="node1.php">Contents</a></strong> 
<!--End of Navigation Panel-->

<address>
Angel M de Vicente
2004-10-25
</address>

</body>
</html>
