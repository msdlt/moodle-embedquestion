# moodle-embedquestion
A Moodle method of embedding questions from the Question Bank into Activities.

This project was expected to be a filter plug-in but is now deployed as a workaround
using a different plug-in and modified php files.

## Purpose

This repository contains files and instructions for use with Moodle. They form a
work-around which enables Question Bank questions to be inserted in amongst the
content of a Book or other activity. This is not a plug-in. It requires minor
modifications to your Moodle installation.

Our aim in developing this filter is to provide self-test questions which are inline 
with teaching content. This functionality is not currently provided by the Quiz, 
Book or Lesson activities (nor any other that we're aware of): The Quiz module is for
assessment; the Book module provides static content. The questions in the lesson tool
are too restrictive and are not inline with the content.

Self test questions can enliven teaching materials. Integration with the Question
Bank will allow a wider range of questions and take advantages of the QB's extensible
structure.

Our primary use case is to put a short answer question into a book activity.

## Implementation

### Requirements

1. [Generico filter plugin][3]
1. [Generico Atto Editor plugin][4]
1. a new directory in the Moodle root. We called ours /msdlt/. This will contain the files
   which this project depends upon 
1. copies of [iframeResizer.min.js][7] and [iframeResizer.contentWindow.min.js][8] in the
   directory created above.

### Configuration

1. amendments to the moodle configuration:
    1. add reference to iframeResizer.min.js ```<script src="/msdlt/iframe-resizer/js/iframeResizer.js"></script>```
       into _Site administration > Appearance > Additional HTML_. This places the link on
       every page of the site. This is undesireable but there were JQuery dependency
       issues when I tried adding it through the Generico plugin.
    1. configure a template for the Generico filter plugin using the following code:
 
       ```<iframe src="/msdlt/preview_msdlt.php?id=@@questionid@@&correctness=0&marks=0&markdp=0&feedback=1&generalfeedback=1&rightanswer=1&history=0"```
       ```    width="100%" border="none">Your browser does not support frames.```
       ```    You will not be able to view the self test questions or additional resources.</iframe>```
       ```<script>iFrameResize({log:true})</script>```

       Please note that you can configure the behaviour of the preview page using the query
       string, and you can pass in variables. The other fields on the Generico template take
       default values. The iframe source above explicitly references the amended preview php.
    1. add key to /lang/en/question.php ```$string['submitandfinishmsdlt'] = '<your text here>';```.
       This key is optional. If you don't need it then revert the string in preview_msdlt.php:
       ```get_string('submitandfinishmsdlt', 'question')``` to ```get_string('submitandfinish', 'question')```
1. copy or clone the preview_msdlt.php and previewlib_msdlt.php from this repository into the
   /msdlt_code/ directory (or whichever is your choice). Update paths if required

## To Do

1. demonstrate that fixed string can be replaced with iframe _done in [commit 671d2b0][1]_.
   This follows the [developer documentation for filter development][2].
1. insert item from an array of search strings can be inserted into the target for iframe
1. put in tests for error handling and to improve robustness.
1. test whether javascript can be used to insert preview into body instead of iframe
1. create editor plugin which integrates with Question Bank so that editors can insert a question

[1]:https://github.com/msdlt/moodle-filter_embedquestion/commit/671d2b03b61e369e2929ed9d4ecf942d39463826
[2]:https://docs.moodle.org/dev/Filters

[3]:https://moodle.org/plugins/filter_generico
[4]:https://moodle.org/plugins/atto_generico
[5]:https://github.com/davidjbradshaw/iframe-resizer
[6]:https://github.com/msdlt/moodle-embedquestion
[7]:https://github.com/davidjbradshaw/iframe-resizer/blob/master/js/iframeResizer.min.js
[8]:https://github.com/davidjbradshaw/iframe-resizer/blob/master/js/iframeResizer.contentWindow.min.js
