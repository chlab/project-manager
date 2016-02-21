ProjectManager
==============

This is the term project for the 5th Semester of my studies for "Dipl. Techniker HF" at TEKO Bern.
It's a small web application with which you can define project templates, then track projects according to the templates. Each project consists of phases, which have activities, which in turn have human- and financial resources attached to them. The choice of technology was left to us students so I opted for Symfony2.

Due to the time limit of this project, I focused on the must-have functionality. Things like i18n, automated testing, usability were left on the wayside. User authentification and roles are also not within the scope of the project.


Todo - prio 1
-------------
* ~~create new projects from templates~~
* add milestones
* enable editing of phases
* ~~add "start" project functionality~~
* add "complete" project functionality
* define superclasses for project/phase/activity and ressources
* add planned hours/actual hours to hr entity
* add project and phase approval dates
* add changes to ERD
* automatically create milestones for the completion of each phase
* allow referencing of files to project, phase or activities
* calculate completion-percentage of projects and phases

Todo - prio 2
-------------

* turn around logic of phase, activity, and resource templates. Make them extend the parent instead of being included by the parent.
