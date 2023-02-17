
all: manual.pdf

.PHONY: manual.dvi manual.pdf

manual.dvi:
	latex manual.tex

manual.pdf: manual.dvi
	dvipdf manual.dvi

html: 
	latex2html -local_icons manual.tex

clean:
	rm -f *.aux *.log *.out *.toc
