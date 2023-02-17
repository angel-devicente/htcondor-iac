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

