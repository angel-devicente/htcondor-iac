
all: course.pdf

.PHONY: course.dvi course.pdf

course.dvi:
	latex course.tex

course.pdf: course.dvi
	dvipdf course.dvi

html: 
	latex2html -split 4 course.tex

clean:
	rm -f *.aux *.log *.out *.toc
