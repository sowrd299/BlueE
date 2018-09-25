<?php

/* mod/dashboard.html */
class __TwigTemplate_bb5f09fe604c9c37fb93b0c40ff8059c9fabc164d6b400b4ae9a3fc34adc8e38 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<fieldset>
\t<legend>";
        // line 2
        echo gettext("Boards");
        echo "</legend>
\t
\t<ul>
\t\t";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["boards"]) ? $context["boards"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["board"]) {
            // line 6
            echo "\t\t\t<li>
\t\t\t\t<a href=\"?/";
            // line 7
            echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_path"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"));
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_index");
            echo "\">";
            echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_abbreviation"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"));
            echo "</a>
\t\t\t\t\t - 
\t\t\t\t";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "title"));
            echo "
\t\t\t\t";
            // line 10
            if ($this->getAttribute((isset($context["board"]) ? $context["board"] : null), "subtitle")) {
                // line 11
                echo "\t\t\t\t\t<small>&mdash; 
\t\t\t\t\t\t";
                // line 12
                if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "allow_subtitle_html")) {
                    // line 13
                    echo "\t\t\t\t\t\t\t";
                    echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "subtitle");
                    echo "
\t\t\t\t\t\t";
                } else {
                    // line 15
                    echo "\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "subtitle"));
                    echo "
\t\t\t\t\t\t";
                }
                // line 17
                echo "\t\t\t\t\t</small>
\t\t\t\t";
            }
            // line 19
            echo "\t\t\t\t";
            if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "manageboards"))) {
                // line 20
                echo "\t\t\t\t\t <a href=\"?/edit/";
                echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri");
                echo "\"><small>[";
                echo gettext("edit");
                echo "]</small></a>
\t\t\t\t";
            }
            // line 22
            echo "\t\t\t</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['board'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "\t\t
\t\t";
        // line 25
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "newboard"))) {
            // line 26
            echo "\t\t\t<li style=\"margin-top:15px\"><a href=\"?/new-board\"><strong>";
            echo gettext("Create new board");
            echo "</strong></a></li>
\t\t";
        }
        // line 28
        echo "\t</ul>
</fieldset>

<fieldset>
\t<legend>";
        // line 32
        echo gettext("Messages");
        echo "</legend>
\t<ul>
\t\t";
        // line 34
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "noticeboard"))) {
            // line 35
            echo "\t\t\t";
            if ((count((isset($context["noticeboard"]) ? $context["noticeboard"] : null)) > 0)) {
                // line 36
                echo "\t\t\t\t<li>
\t\t\t\t\t";
                // line 37
                echo gettext("Noticeboard");
                echo ":
\t\t\t\t\t<ul>
\t\t\t\t\t\t";
                // line 39
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["noticeboard"]) ? $context["noticeboard"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                    // line 40
                    echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"?/noticeboard#";
                    // line 41
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
                    echo "\">
\t\t\t\t\t\t\t\t\t";
                    // line 42
                    if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject")) {
                        // line 43
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject"));
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 45
                        echo "\t\t\t\t\t\t\t\t\t\t<em>";
                        echo gettext("no subject");
                        echo "</em>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 47
                    echo "\t\t\t\t\t\t\t\t</a> 
\t\t\t\t\t\t\t\t<small class=\"unimportant\">
\t\t\t\t\t\t\t\t\t&mdash; by 
\t\t\t\t\t\t\t\t\t";
                    // line 50
                    if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "username")) {
                        // line 51
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "username"));
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 53
                        echo "\t\t\t\t\t\t\t\t\t\t<em>deleted?</em>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 54
                    echo " 
\t\t\t\t\t\t\t\t\tat 
\t\t\t\t\t\t\t\t\t";
                    // line 56
                    echo twig_date_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "time"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
                    echo " 
\t\t\t\t\t\t\t\t</small>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 60
                echo "\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t";
            }
            // line 63
            echo "\t\t\t<li><a href=\"?/noticeboard\">";
            echo gettext("View all noticeboard entries");
            echo "</a></li>
\t\t";
        }
        // line 65
        echo "\t\t<li><a href=\"?/news\">";
        echo gettext("News");
        echo "</a></li>
\t\t<li>
\t\t\t<a href=\"?/inbox\">
\t\t\t\t";
        // line 68
        echo gettext("PM inbox");
        echo " 
\t\t\t\t";
        // line 69
        if (((isset($context["unread_pms"]) ? $context["unread_pms"] : null) > 0)) {
            echo "<strong>";
        }
        echo "(";
        echo (isset($context["unread_pms"]) ? $context["unread_pms"] : null);
        echo " unread)";
        if (((isset($context["unread_pms"]) ? $context["unread_pms"] : null) > 0)) {
            echo "</strong>";
        }
        // line 70
        echo "\t\t\t</a>
\t\t</li>
\t</ul>
</fieldset>

<fieldset>
\t<legend>";
        // line 76
        echo gettext("Administration");
        echo "</legend>
\t
\t<ul>
\t\t";
        // line 79
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "reports"))) {
            // line 80
            echo "\t\t\t<li>
\t\t\t\t";
            // line 81
            if (((isset($context["reports"]) ? $context["reports"] : null) > 0)) {
                echo "<strong>";
            }
            // line 82
            echo "\t\t\t\t\t<a href=\"?/reports\">";
            echo gettext("Report queue");
            echo " (";
            echo (isset($context["reports"]) ? $context["reports"] : null);
            echo ")</a>
\t\t\t\t";
            // line 83
            if (((isset($context["reports"]) ? $context["reports"] : null) > 0)) {
                echo "</strong>";
            }
            // line 84
            echo "\t\t\t</li>
\t\t";
        }
        // line 86
        echo "\t\t";
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "view_banlist"))) {
            // line 87
            echo "\t\t\t<li><a href=\"?/bans\">";
            echo gettext("Ban list");
            echo "</a></li>
\t\t";
        }
        // line 89
        echo "\t\t";
        if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "ban_appeals") && twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "view_ban_appeals")))) {
            // line 90
            echo "\t\t\t<li><a href=\"?/ban-appeals\">";
            echo gettext("Ban appeals");
            echo "</a></li>
\t\t";
        }
        // line 92
        echo "\t\t";
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "manageusers"))) {
            // line 93
            echo "\t\t\t<li><a href=\"?/users\">";
            echo gettext("Manage users");
            echo "</a></li>
\t\t";
        } elseif (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "change_password"))) {
            // line 95
            echo "\t\t\t<li><a href=\"?/users/";
            echo $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "id");
            echo "\">";
            echo gettext("Change password");
            echo "</a></li>
\t\t";
        }
        // line 97
        echo "\t\t";
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "themes"))) {
            // line 98
            echo "\t\t\t<li><a href=\"?/themes\">";
            echo gettext("Manage themes");
            echo "</a></li>
\t\t";
        }
        // line 100
        echo "\t\t";
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "modlog"))) {
            // line 101
            echo "\t\t\t<li><a href=\"?/log\">";
            echo gettext("Moderation log");
            echo "</a></li>
\t\t";
        }
        // line 103
        echo "\t\t";
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "rebuild"))) {
            // line 104
            echo "\t\t\t<li><a href=\"?/rebuild\">";
            echo gettext("Rebuild");
            echo "</a></li>
\t\t";
        }
        // line 106
        echo "\t\t";
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "edit_config"))) {
            // line 107
            echo "\t\t\t<li><a href=\"?/config\">";
            echo gettext("Configuration");
            echo "</a></li>
\t\t";
        }
        // line 109
        echo "\t\t
\t</ul>
</fieldset>

";
        // line 113
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "search"))) {
            // line 114
            echo "\t<fieldset>
\t\t<legend>";
            // line 115
            echo gettext("Search");
            echo "</legend>
\t\t
\t\t<ul>
\t\t\t<li>
\t\t\t\t";
            // line 119
            $this->env->loadTemplate("mod/search_form.html")->display($context);
            // line 120
            echo "\t\t\t</li>
\t\t</ul>
\t</fieldset>
";
        }
        // line 124
        echo "
";
        // line 125
        if (count($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "dashboard_links"))) {
            // line 126
            echo "\t<fieldset>
\t\t<legend>";
            // line 127
            echo gettext("Other");
            echo "</legend>
\t
\t\t<ul>
\t\t\t";
            // line 130
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "dashboard_links"));
            foreach ($context['_seq'] as $context["label"] => $context["link"]) {
                // line 131
                echo "\t\t\t\t<li><a href=\"";
                echo (isset($context["link"]) ? $context["link"] : null);
                echo "\">";
                echo (isset($context["label"]) ? $context["label"] : null);
                echo "</a></li>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['label'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 133
            echo "\t\t</ul>
\t</fieldset>
";
        }
        // line 136
        echo "
";
        // line 137
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "debug")) {
            // line 138
            echo "\t<fieldset>
\t\t<legend>";
            // line 139
            echo gettext("Debug");
            echo "</legend>
\t\t<ul>
\t\t\t<li><a href=\"?/debug/antispam\">";
            // line 141
            echo gettext("Anti-spam");
            echo "</a></li>
\t\t\t<li><a href=\"?/debug/recent\">";
            // line 142
            echo gettext("Recent posts");
            echo "</a></li>
\t\t\t";
            // line 143
            if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "debug_sql"))) {
                // line 144
                echo "\t\t\t\t<li><a href=\"?/debug/sql\">";
                echo gettext("SQL");
                echo "</a></li>
\t\t\t";
            }
            // line 146
            echo "\t\t</ul>
\t</fieldset>
";
        }
        // line 149
        echo "
";
        // line 150
        if ((isset($context["newer_release"]) ? $context["newer_release"] : null)) {
            // line 151
            echo "\t<fieldset>
\t\t<legend>Update</legend>
\t\t<ul>
\t\t\t<li>
\t\t\t\tA newer version of Tinyboard 
\t\t\t\t(<strong>v";
            // line 156
            echo $this->getAttribute((isset($context["newer_release"]) ? $context["newer_release"] : null), "massive");
            echo ".";
            echo $this->getAttribute((isset($context["newer_release"]) ? $context["newer_release"] : null), "major");
            echo ".";
            echo $this->getAttribute((isset($context["newer_release"]) ? $context["newer_release"] : null), "minor");
            echo "</strong>) is available! 
\t\t\t\tSee <a href=\"http://tinyboard.org\">http://tinyboard.org/</a> for upgrade instructions.
\t\t\t</li>
\t\t</ul>
\t</fieldset>
";
        }
        // line 162
        echo "
<fieldset>
\t<legend>";
        // line 164
        echo gettext("User account");
        echo "</legend>
\t
\t<ul>
\t\t<li><a href=\"?/logout/";
        // line 167
        echo (isset($context["logout_token"]) ? $context["logout_token"] : null);
        echo "\">";
        echo gettext("Logout");
        echo "</a></li>
\t</ul>
</fieldset>

";
    }

    public function getTemplateName()
    {
        return "mod/dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  452 => 167,  446 => 164,  442 => 162,  429 => 156,  422 => 151,  420 => 150,  417 => 149,  412 => 146,  406 => 144,  404 => 143,  400 => 142,  396 => 141,  391 => 139,  388 => 138,  386 => 137,  383 => 136,  378 => 133,  367 => 131,  363 => 130,  357 => 127,  354 => 126,  352 => 125,  349 => 124,  343 => 120,  341 => 119,  334 => 115,  331 => 114,  329 => 113,  323 => 109,  317 => 107,  314 => 106,  308 => 104,  305 => 103,  299 => 101,  296 => 100,  290 => 98,  287 => 97,  279 => 95,  273 => 93,  270 => 92,  264 => 90,  261 => 89,  255 => 87,  252 => 86,  248 => 84,  244 => 83,  237 => 82,  233 => 81,  230 => 80,  228 => 79,  222 => 76,  214 => 70,  204 => 69,  200 => 68,  193 => 65,  187 => 63,  182 => 60,  172 => 56,  168 => 54,  164 => 53,  158 => 51,  156 => 50,  151 => 47,  145 => 45,  139 => 43,  137 => 42,  133 => 41,  130 => 40,  126 => 39,  121 => 37,  118 => 36,  115 => 35,  113 => 34,  108 => 32,  102 => 28,  96 => 26,  94 => 25,  91 => 24,  84 => 22,  76 => 20,  73 => 19,  69 => 17,  63 => 15,  57 => 13,  55 => 12,  52 => 11,  50 => 10,  46 => 9,  38 => 7,  35 => 6,  31 => 5,  25 => 2,  22 => 1,);
    }
}
