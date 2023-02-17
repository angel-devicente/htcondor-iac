# LaTeX2HTML 2002-2-1 (1.71)
# Associate images original text with physical files.


$key = q/>;MSF=1.6;AAT/;
$cached_env_img{$key} = q|<IMG
 WIDTH="15" HEIGHT="29" ALIGN="MIDDLE" BORDER="0"
 SRC="|."$dir".q|img2.png"
 ALT="$&gt;$">|; 

$key = q/<;MSF=1.6;AAT/;
$cached_env_img{$key} = q|<IMG
 WIDTH="15" HEIGHT="29" ALIGN="MIDDLE" BORDER="0"
 SRC="|."$dir".q|img1.png"
 ALT="$&lt;$">|; 

$key = q/includegraphics[width=textwidth]{condor_job_monitor.ps};AAT/;
$cached_env_img{$key} = q|<IMG
 WIDTH="555" HEIGHT="588" ALIGN="BOTTOM" BORDER="0"
 SRC="|."$dir".q|img3.png"
 ALT="\includegraphics[width=\textwidth]{condor_job_monitor.ps}">|; 

1;

