<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<title>Condor system at the IAC: Code of Conduct</title>
<script type="text/javascript" src="../Javascript/genera_correo.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<table>
 <tr>
  <td>
   <h1><a href="index.php">Home</a></h1>

   <h2>Documentation</h2>
   
   <p class="menuentry">Condor
   Primer, <em>in Spanish</em> (<a
   href="iac_manual/html/index.php">HTML</a> <a
   href="iac_manual/manual.pdf">PDF</a>)</p>

   <p class="menuentry">Condor
   Manual (<a
   href="http://www.cs.wisc.edu/condor/manual/v7.4/index.html">HTML</a>
   <a href="http://www.cs.wisc.edu/condor/manual/v7.4/condor-V7_4_4-Manual.pdf">PDF</a>)</p>

   <p class="menuentry">Talk on Condor (28/9/2004) (<a
   href="presentacion/presentacion_condor.ppt">PPT</a> <a href="presentacion/presentacion_condor.pdf">PDF</a>)</p>

   <p class="menuentry">Hands-on session with Condor (Oct 2004) <br /> <br />
   Workbook: (<a
   href="curso/course/index.php">HTML</a> <a
   href="curso/course.pdf">PDF</a>) <br />


Code: (<a
   href="curso/Examples/Examples.tar">Examples</a> <a
   href="curso/Exercises/Exercises.tar">Exercises</a>)<br />
   <a href="resultados_encuesta.php">Questionnaire results</a> (<em>in
   Spanish</em>)</p>

   <h2>Monitorization</h2>
   
   <p class="menuentry"><a href="http://nectarino/">Condor
   Pool Statistics</a></p>

</td>

  <td>

<h3>Condor Code of Conduct</h3>

<p> Condor is a terrific tool for performing parametric studies and other type of
jobs that can run simultaneously and independently in a number of
machines. Nevertheless, under certain circumstances, if you are not careful you
can bring the network to a crawl. To avoid these situations, please stick to
this simple code of conduct:</p>

<p>
1) Submit jobs only from your machine or from a machine whose owner you have
contacted and is aware of the extra load that you will put on it. No submission
from public machines, sorry! (For each Condor running job, there is a process
running in the submitting machine, plus lots of network connections, so the
submitting machine pays a big toll, which is not fair to pass it to someone else
unawares).</p>

<p>
2) If you plan to run I/O intensive code (i.e. code that reads or writes to disk
very large files, or small ones but very often), get in touch with me
first. Depending on how I/O intensive your code is, it might not be worth it to
use Condor, or I might be able to offer you counsel on how to best do
it. Hopefully your Condor submission will perform faster if we take this into
account.</p>

<p>
3) Test your submission. Don't go nuts and submit a 10000 jobs submission
without first making sure the whole thing will work with a smaller subset. Start
small, verify that things are going OK, check the logs to see that the jobs can
access all the necessary files, etc. and only when you are satisfied that things
are working go for the big submission.</p>
<p>Please stick to these basic rules so that we can avoid Condor affecting other
users' work.
</p>

<p>Angel de Vicente (<script type="text/javascript">angel();</script>)  </p></td>
 </tr>
</table>
</body>
</html>

