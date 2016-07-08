# moodle-filter_embedquestion
A Moodle filter for embedding questions into Book and other activities

## Purpose

This filter inserts a question in preview mode into the body of an activity.

Our aim in developing this filter is to provide self-test questions mixed in 
with teaching content.

The Quiz module is built around assessment; the Book module provides mostly 
static content. The questions in the lesson tool are too restrictive and are not
inline with the content.

Self test questions can enliven teaching materials. Integrating with the Question
Bank will allow a wider range of questions and take advantages of its extensible
structure.

Our primary use case is to put a short answer question into a book activity.

## To Do

1. demonstrate that fixed string can be replaced with iframe _done in [commit 671d2b0][1]_.
   This follows the [developer documentation for filter development][2].
1. insert item from an array of search strings can be inserted into the target for iframe
1. put in tests for error handling and to improve robustness.
1. test whether javascript can be used to insert preview into body instead of iframe
1. create editor plugin which integrates with Question Bank so that editors can insert a question

[1]:https://github.com/msdlt/moodle-filter_embedquestion/commit/671d2b03b61e369e2929ed9d4ecf942d39463826
[2]:https://docs.moodle.org/dev/Filters
