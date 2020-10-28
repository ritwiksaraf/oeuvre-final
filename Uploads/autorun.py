#!/usr/bin/python3

from cms import updatedb, fileMove
import sys

docfile = sys.argv[1]
garbage = sys.argv[2]
garbage2 = sys.argv[3]

updatedb(docfile)
fileMove()

