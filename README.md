ProjectManager
==============

This is the term project for the 5th Semester of my studies for "Dipl. Techniker HF" at TEKO Bern.
It's a small web application with which you can define project templates, then track projects according to the templates. Each project consists of phases, which have activities, which in turn have human- and financial resources attached to them. The choice of technology was left to us students so I opted for Symfony2.

Due to the time limit of this project, I focused on the must-have functionality. Things like i18n, automated testing, usability were left on the wayside.


Todo - prio 1
-------------

* calculate completion-percentage of projects and phases
* create new projects from templates

Todo - prio 2
-------------

* turn around logic of phase, activity, and resource templates. Make them extend the parent instead of being included by the parent.