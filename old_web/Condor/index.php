<?php 
$lastupdate="February 2013";
?>

<?php include("../includes/ipfilter.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>

<title>Information about the Condor system at the IAC</title>
<link  rel="stylesheet" type="text/css" href="style.css"/>
<script  type="text/javascript" src="../Javascript/genera_correo.js"></script>
</head>

<body>
<table>
 <tr>
  <td>
   <h1>Documentation</h1>

   <p class="menuentry"><a href="code_of_conduct.php">Condor Code of Conduct</a></p>

   <p class="menuentry">Condor Primer, <em>in Spanish</em> (<a
   href="iac_manual/html/index.php">HTML</a> <a
   href="iac_manual/manual.pdf">PDF</a>)</p>

   <p class="menuentry">Condor
   Manual (<a href="http://www.cs.wisc.edu/condor/manual/v7.4/index.html">HTML</a>
   <a href="http://www.cs.wisc.edu/condor/manual/v7.4/condor-V7_4_4-Manual.pdf">PDF</a>)</p>

   <p class="menuentry">Talk on Condor (28/9/2004) (<a
   href="presentacion/presentacion_condor.ppt">PPT</a> <a href="presentacion/presentacion_condor.pdf">PDF</a>)</p>

   <p class="menuentry">Hands-on session with Condor (Oct 2004) <br /> <br />
   Workbook: (<a href="curso/course/index.php">HTML</a> 
   <a href="curso/course.pdf">PDF</a>) <br />


Code: (<a
   href="curso/Examples/Examples.tar">Examples</a> <a
   href="curso/Exercises/Exercises.tar">Exercises</a>)<br />
   <a href="resultados_encuesta.php">Questionnaire results</a> (<em>in
   Spanish</em>)</p>

   <h1>Monitorization</h1>

   <p class="menuentry"><a href="condor_statistics.php">Condor
   Pool Statistics</a></p>

</td>
  <td>
   <h1>Information about the <a href="http://www.cs.wisc.edu/condor/">Condor</a> system at the IAC</h1>

<div style="border:3px solid red;padding: 10px">
  <div style="color:red; border:0px black solid; font-size: 2.00em; text-align: center; margin-bottom: 0.80em;">WARNING: 
    OBSOLETE CONTENT!!!
  </div>
    The information shown on these pages refers to a <b>version of Condor much older</b>
    than the one currently installed. Although most of the information
    is still valid, it might be obsolete in some topics, and some links may
    be broken.<br /><br /><b>
    Please, visit instead 
    <a href="https://research.iac.es/sieinvens/siepedia/pmwiki.php?n=HOWTOs.Condor">Condor at SIEpedia</a> and 
    <a href="http://research.iac.es/sieinvens/SINFIN/Main/supercomputing.php">Supercomputing at IAC</a>
    for an updated version.</b>
</div>

<hr />


<h2>An <a href="http://www.cs.wisc.edu/condor/overview/">Overview</a> of the Condor System </h2>


<h3>On High-Throughput Computing</h3>

<p> For many scientists, the quality of their research is heavily dependent on
computing throughput.  It is not uncommon to find problems that require weeks or
months of computation to solve.  Scientists involved in this type of research
need a computing environment that delivers large amounts of computational power
over a long period of time. Such an environment is called a High-Throughput
Computing (HTC) environment. In contrast, High-Performance Computing (HPC)
environments deliver a tremendous amount of power over a short period of time.
HPC environments are often measured in terms of FLoating point OPerations per
Second (FLOPS).  Many scientists today do not care about FLOPS; their problems
are on a much larger scale.  These people are concerned with floating point
operations per month or per year.  They are interested in how many jobs they can
complete over a long period of time.</p>
<p> A key to high throughput is the efficient use of available resources.  Years
ago, the scientific community relied on large mainframe computers to do
computational work.  A large number of individuals and groups would have to pool
their financial resources to afford such a computer.  It was not uncommon to
find just one such machine at even the largest research institutions.
Scientists would wait their turn for mainframe time, and they would be allocated
a specific amount of time.  Scientists limited the size and scope of their
problems to ensure completion.  While this environment was inconvenient for the
users, it was very efficient, because the mainframe was busy nearly all the
time.</p>
<p> As computers became smaller, faster and less expensive, scientists moved
away from mainframes and purchased personal computers or workstations.  An
individual or a small group could afford a computing resource that was available
whenever they wanted it.  The resource might be slower than the mainframe, but
it provided exclusive access.  Recently, instead of one large computer for an
institution, there are many workstations.  Each workstation is owned by its
user.  This is distributed ownership.  While distributed ownership is more
convenient for the users, it is also less efficient.  Machines sit idle for long
periods of time, often while their users are busy doing other things.
<strong>Condor takes this wasted computation time and puts it to good use.</strong> The
situation today matches that of yesterday, with the addition of clusters in the
list of resources.  These machines are often dedicated to tasks.  Condor manages
a cluster's effort efficiently, as well as handling other resources.</p>
<p> To achieve the highest throughput, Condor provides two important functions.
First, it makes available resources more efficient by putting idle machines to
work.  Second, it expands the resources available to users, by functioning well
in an environment of distributed ownership.</p>
<h3>Why use Condor?</h3>

<p> Condor takes advantage of computing resources that would otherwise be wasted
and puts them to good use.  Condor streamlines the scientist's tasks by allowing
the submission of many jobs at the same time.  In this way, tremendous amounts
of computation can be done with very little intervention from the user.
Moreover, Condor allows users to take advantage of idle machines that they would
not otherwise have access to.</p>
<p> Condor provides other important features to its users.  Source code does not
have to be modified in any way to take advantage of these benefits.  Code that
can be re-linked with the Condor libraries gains two further abilities: the jobs
can produce checkpoints and they can perform remote system calls.</p>
<p> A checkpoint is the complete set of information that comprises a program's
state.  Given a checkpoint, a program can use the checkpoint to resume
execution.  For long-running computations, the ability to produce and use
checkpoints can save days, or even weeks of accumulated computation time.  If a
machine crashes, or must be rebooted for an administrative task, a checkpoint
preserves computation already completed.  Condor makes checkpoints of jobs,
doing so periodically, or when the machine on which a job is executing will
shortly become unavailable.  In this way, the job can be continued on another
machine (of the same platform); this is known as process migration.</p>
<p> A user submits a job to Condor.  The job is executed on a remote machine
within the pool of machines available to Condor.  Minimal impact on and the
security of the remote machine are preserved by Condor through remote system
calls.  When the job does a system call, for example to do an input or output
function, the data is maintained on the machine where the job was submitted.
The data is not on the remote machine, where it could be an imposition.</p>
<p> By linking in a set of Condor libraries, system calls are caught and
performed by Condor, instead of by the remote machine's operating system.
Condor sends the system call from the remote machine to the machine where the
jobs was submitted.  The system call's function executes, and Condor sends the
result back to the remote machine.</p>
<p> This implementation has the added benefit that a user submitting jobs to
Condor does not need an account on the remote machine.</p>
<h3>Small Businesses Like Condor</h3>

<p>
Condor starts with the assumption that you have relatively long running tasks
that do not require user interaction.  While this is not common in small
business environments, it does occur.  To take examples from businesses that we
know are using Condor, tasks involve rendering 3D scenes for a movie, performing
a nightly build and regression test on software under development, simulating
and analyzing stock market behavior, and simulating the effects of various
political decisions.  Modern video codecs often take a long time to encode, and
any business generating video files could use Condor to manage the process.  A
small biotechnology company might want to use Condor to manage the long running
pattern searches over the human genome.  A small engineering company might have
similar needs with long running simulations of stress on a building, wind tunnel
simulations for cars, or circuit simulations for new electronics devices.</p>
<p>
Condor helps those businesses with long running tasks.  Such businesses may be
using some sort of batch system already, or operate by starting the program each
evening, hoping that it finishes before they return in the morning.  This is the
sort of situation in which Condor excels.  Condor also saves time and effort
when the time it takes a user to get jobs executing is longer than a few
moments, or when a large number of jobs (of any size) must be started.</p>
<p>
Condor allows almost any application that can run without user interaction to be
managed.  This is different from systems like SETI@Home and ProteinFolding@Home.
These programs are custom written.  Most small companies will not have the
resources to custom build an opportunistic batch processing system.
Fortunately, Condor provides a general solution.</p>
<p>
Condor can be useful on a range of network sizes, from small to large.  On a
single machine, Condor can act as a monitoring tool that pauses the job when the
user uses the machine for other purposes, and it restarts the job if the machine
reboots.  On a small dedicated cluster, Condor functions well as a cluster
submission tool.  If you have long running jobs but can not afford to purchase
dedicated machines to run the jobs, you can use Condor's opportunistic behavior
to scavenge cycles from desktop machines when their users are not using the
machines (for example, in the evening or during lunch).</p>
<p>
In a typical business these desktop machines are unused for twelve or more hours
per day.  This processing time is available at no extra cost under Condor.  A
long running job expected to require the exclusive use of a workstation for two
days may be able to produce results overnight.</p>
<p>
Condor's functionality called DAGMan, manages the submission of a large number
of jobs with simple or complex dependencies on each other.  A simple example is
that job A and B must complete before job C can start.  A rendering example of
this would be that job A renders a 3D special effect, job B renders the
background, and job C superimposes the special effect onto the background.
Condor DAGMan can also be used to run a series of jobs (linearly).</p>
<p>
If the small business is using Globus grid resources to gain access to more
computing power than it has available in house, Condor-G provides reliability
and job management to their jobs.  Or, with Condor glidein, remote Globus grid
resources can transparently become part of a virtual Condor cluster.</p>
<h3>Everyone Benefits</h3>
<p> As more machines join a Condor pools, the quantity of computational
resources available to the users grows.  While Condor can efficiently manage the
queuing of jobs where the pool consists of a single machine, Condor works
extremely well when the pool contains hundreds of machines.</p>
<p> A contributor to Condor's success is its ClassAd mechanism.  Jobs want to
find machines upon which they can execute.  A job will require a specific
platform on which to execute.  Machines have specific resources available, such
as the platform and the amount of available memory.  A separate ClassAd is
produced for each job and machine, listing all attributes.  Condor acts as a
matchmaker between the jobs and the machines by pairing the ClassAd of a job
with the ClassAd of a machine.</p>
<p> This mechanism is much more flexible than the simple example of matching the
platforms of jobs with those of machines.  A job may also prefer to execute on a
machine with better floating point facilities, or it may prefer to execute on a
specific set of machines.  These preferences are also expressed in the ClassAd.
Further, a machine owner has great control over which jobs are executed under
what circumstances on the machine.  The owner writes a configuration file that
specifies both requirements and preferences for the jobs.  The owner may allow
jobs to execute when the machine is idle (identified by low load and no keyboard
activity), or allow jobs only on Tuesday evenings.  There may be a requirement
that only jobs from a specific group of users may execute.  Alternatively, any
of these may be expressed as a preference, for example where the machine prefers
the jobs of a select group, but will accept the jobs of others if there are no
jobs from the select group.</p>
<p> In this way, machine owners have extensive control over their machine.  And,
with this control, more machine owners are happy to participate by joining a
Condor pool.   </p>
<div class="links">
   <p><a href="http://validator.w3.org/check/referer"><img alt="Valid XHTML 1.0" src="valid-xhtml10.png" /></a></p>
   </div>  </td>
 </tr>
</table>

<?php include("../includes/footer.php"); ?>

</body>
</html>

