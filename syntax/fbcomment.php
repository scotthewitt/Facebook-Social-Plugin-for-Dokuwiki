<?php
/**
 * DokuWiki Plugin fblike (Syntax Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Scott <fbl@scotthewitt.co.uk>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

if (!defined('DOKU_LF')) define('DOKU_LF', "\n");
if (!defined('DOKU_TAB')) define('DOKU_TAB', "\t");
if (!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once DOKU_PLUGIN.'syntax.php';

class syntax_plugin_fbsp_fbcomment extends DokuWiki_Syntax_Plugin {
    function getType() {
        return 'substition';
    }

    function getPType() {
        return 'normal';
    }

    function getSort() {
        return FIXME;
    }


    function connectTo($mode) {
        $this->Lexer->addSpecialPattern('<fbc>',$mode,'plugin_fbsp_fbcomment');
//        $this->Lexer->addEntryPattern('<FIXME>',$mode,'plugin_fbsp_fbcomment');
    }

//    function postConnect() {
//        $this->Lexer->addExitPattern('</FIXME>','plugin_fbsp_fbcomment');
//    }

    function handle($match, $state, $pos, &$handler){
        $data = array();

        return $data;
    }

    function render($mode, &$renderer, $data) {
        if($mode != 'xhtml') return false;
			$renderer->doc .= "<html>
<div id=\"fb-root\"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: 'your app id', status: true, cookie: true,
             xfbml: true});
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
  </script>
<fb:comments></fb:comments>
</html>";
        return true;
    }
}

// vim:ts=4:sw=4:et:enc=utf-8:
?>