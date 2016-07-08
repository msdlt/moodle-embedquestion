<?php

class filter_embedquestion extends moodle_text_filter {
        public function filter($text, array $options = array()) {
            return str_replace('world', 'hello world!
<iframe src="http://moodle.local/question/preview.php?id=47&courseid=2" style="width: 620px; height: 690px; border: none;">Your browser does not support frames</iframe>', $text);
        }
    }
?>
