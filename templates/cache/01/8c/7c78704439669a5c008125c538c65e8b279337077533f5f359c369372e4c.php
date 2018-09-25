<?php

/* mod/search_results.html */
class __TwigTemplate_018c7c78704439669a5c008125c538c65e8b279337077533f5f359c369372e4c extends Twig_Template
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
        echo "<fieldset style=\"margin-bottom:20px\">
\t<legend>";
        // line 2
        echo gettext("Search");
        echo "</legend>

\t<ul>
\t\t<li>
\t\t\t";
        // line 6
        $this->env->loadTemplate("mod/search_form.html")->display($context);
        // line 7
        echo "\t\t</li>
\t</ul>
</fieldset>

<p style=\"text-align:center\">Showing ";
        // line 11
        echo (isset($context["result_count"]) ? $context["result_count"] : null);
        echo " result";
        if (((isset($context["result_count"]) ? $context["result_count"] : null) != 1)) {
            echo "s";
        }
        echo ".</p>

";
        // line 13
        if (((isset($context["search_type"]) ? $context["search_type"] : null) == "IP_notes")) {
            // line 14
            echo "\t<table class=\"modlog\">
\t\t<tr>
\t\t\t<th>";
            // line 16
            echo gettext("IP address");
            echo "</th>
\t\t\t<th>";
            // line 17
            echo gettext("Staff");
            echo "</th>
\t\t\t<th>";
            // line 18
            echo gettext("Note");
            echo "</th>
\t\t\t<th>";
            // line 19
            echo gettext("Date");
            echo "</th>
\t\t</tr>
\t\t";
            // line 21
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["results"]) ? $context["results"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 22
                echo "\t\t\t<tr>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t<a href=\"?/IP/";
                // line 24
                echo $this->getAttribute((isset($context["note"]) ? $context["note"] : null), "ip");
                echo "#notes\">";
                echo $this->getAttribute((isset($context["note"]) ? $context["note"] : null), "ip");
                echo "</a>
\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t";
                // line 27
                if ($this->getAttribute((isset($context["note"]) ? $context["note"] : null), "username")) {
                    // line 28
                    echo "\t\t\t\t\t\t<a href=\"?/new_PM/";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["note"]) ? $context["note"] : null), "username"));
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["note"]) ? $context["note"] : null), "username"));
                    echo "</a>
\t\t\t\t\t";
                } else {
                    // line 30
                    echo "\t\t\t\t\t\t<em>";
                    echo gettext("deleted?");
                    echo "</em>
\t\t\t\t\t";
                }
                // line 32
                echo "\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t";
                // line 34
                echo $this->getAttribute((isset($context["note"]) ? $context["note"] : null), "body");
                echo "
\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t";
                // line 37
                echo twig_date_filter($this->getAttribute((isset($context["note"]) ? $context["note"] : null), "time"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
                echo "
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "\t</table>
";
        }
        // line 43
        echo "
";
        // line 44
        if (((isset($context["search_type"]) ? $context["search_type"] : null) == "bans")) {
            // line 45
            echo "\t<table class=\"modlog\" style=\"width:100%\">
\t\t<tr>
\t\t\t<th>";
            // line 47
            echo gettext("IP address/mask");
            echo "</th>
\t\t\t<th>";
            // line 48
            echo gettext("Reason");
            echo "</th>
\t\t\t<th>";
            // line 49
            echo gettext("Board");
            echo "</th>
\t\t\t<th>";
            // line 50
            echo gettext("Set");
            echo "</th>
\t\t\t<th>";
            // line 51
            echo gettext("Duration");
            echo "</th>
\t\t\t<th>";
            // line 52
            echo gettext("Expires");
            echo "</th>
\t\t\t<th>";
            // line 53
            echo gettext("Seen");
            echo "</th>
\t\t\t<th>";
            // line 54
            echo gettext("Staff");
            echo "</th>
\t\t</tr>
\t\t";
            // line 56
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["results"]) ? $context["results"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["ban"]) {
                // line 57
                echo "\t\t\t<tr";
                if ((($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") != 0) && ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") < time()))) {
                    echo " style=\"text-decoration:line-through\"";
                }
                echo ">
\t\t\t\t<td style=\"white-space: nowrap\">
\t\t\t\t\t";
                // line 59
                if ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "single_addr")) {
                    // line 60
                    echo "\t\t\t\t\t\t<a href=\"?/IP/";
                    echo $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "mask");
                    echo "#bans\">";
                    echo $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "mask");
                    echo "</a>
\t\t\t\t\t";
                } else {
                    // line 62
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "mask"));
                    echo "
\t\t\t\t\t";
                }
                // line 64
                echo "\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t";
                // line 66
                if ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "reason")) {
                    // line 67
                    echo "\t\t\t\t\t\t";
                    echo $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "reason");
                    echo "
\t\t\t\t\t";
                } else {
                    // line 69
                    echo "\t\t\t\t\t\t-
\t\t\t\t\t";
                }
                // line 71
                echo "\t\t\t\t</td>
\t\t\t\t<td  style=\"white-space: nowrap\">
\t\t\t\t\t";
                // line 73
                if ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "board")) {
                    // line 74
                    echo "\t\t\t\t\t\t";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_abbreviation"), $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "board"));
                    echo "
\t\t\t\t\t";
                } else {
                    // line 76
                    echo "\t\t\t\t\t\t<em>";
                    echo gettext("all boards");
                    echo "</em>
\t\t\t\t\t";
                }
                // line 77
                echo "\t\t\t\t\t
\t\t\t\t</td>
\t\t\t\t<td style=\"white-space: nowrap\">
\t\t\t\t\t<span title=\"";
                // line 80
                echo twig_date_filter($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "created"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
                echo "\">
\t\t\t\t\t\t";
                // line 81
                echo ago($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "created"));
                echo " ago
\t\t\t\t\t</span>
\t\t\t\t</td>
\t\t\t\t<td style=\"white-space: nowrap\">
\t\t\t\t\t";
                // line 85
                if (($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") == 0)) {
                    // line 86
                    echo "\t\t\t\t\t\t-
\t\t\t\t\t";
                } else {
                    // line 88
                    echo "\t\t\t\t\t\t";
                    echo until((($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") - $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "created")) + time()));
                    echo "
\t\t\t\t\t";
                }
                // line 90
                echo "\t\t\t\t</td>
\t\t\t\t<td style=\"white-space: nowrap\">
\t\t\t\t\t";
                // line 92
                if (($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") == 0)) {
                    // line 93
                    echo "\t\t\t\t\t\t<em>";
                    echo gettext("never");
                    echo "</em>
\t\t\t\t\t";
                } else {
                    // line 95
                    echo "\t\t\t\t\t\t";
                    echo twig_date_filter($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
                    echo "
\t\t\t\t\t\t";
                    // line 96
                    if (($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") > time())) {
                        // line 97
                        echo "\t\t\t\t\t\t\t <small>(in ";
                        echo until($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires"));
                        echo ")</small>
\t\t\t\t\t\t";
                    }
                    // line 99
                    echo "\t\t\t\t\t";
                }
                // line 100
                echo "\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t";
                // line 102
                if ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "seen")) {
                    // line 103
                    echo "\t\t\t\t\t\t";
                    echo gettext("Yes");
                    // line 104
                    echo "\t\t\t\t\t";
                } else {
                    // line 105
                    echo "\t\t\t\t\t\t";
                    echo gettext("No");
                    // line 106
                    echo "\t\t\t\t\t";
                }
                // line 107
                echo "\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t";
                // line 109
                if ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "username")) {
                    // line 110
                    echo "\t\t\t\t\t\t";
                    if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "view_banstaff"))) {
                        // line 111
                        echo "\t\t\t\t\t\t\t<a href=\"?/new_PM/";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "username"));
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "username"));
                        echo "</a>
\t\t\t\t\t\t";
                    } else {
                        // line 113
                        echo "\t\t\t\t\t\t\t";
                        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "view_banquestionmark"))) {
                            // line 114
                            echo "\t\t\t\t\t\t\t\t<em>?</em>
\t\t\t\t\t\t\t";
                        } else {
                            // line 116
                            echo "\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                        }
                        // line 118
                        echo "\t\t\t\t\t\t";
                    }
                    // line 119
                    echo "\t\t\t\t\t";
                } elseif (($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "creator") == (-1))) {
                    // line 120
                    echo "\t\t\t\t\t\t<em>system</em>
\t\t\t\t\t";
                } else {
                    // line 122
                    echo "\t\t\t\t\t\t<em>";
                    echo gettext("deleted?");
                    echo "</em>
\t\t\t\t\t";
                }
                // line 124
                echo "\t\t\t\t</td>
\t\t\t</tr>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ban'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 127
            echo "\t</table>
";
        }
        // line 129
        echo "
";
        // line 130
        if (((isset($context["search_type"]) ? $context["search_type"] : null) == "log")) {
            // line 131
            echo "\t<table class=\"modlog\">
\t\t<tr>
\t\t\t<th>";
            // line 133
            echo gettext("Staff");
            echo "</th>
\t\t\t<th>";
            // line 134
            echo gettext("IP address");
            echo "</th>
\t\t\t<th>";
            // line 135
            echo gettext("Time");
            echo "</th>
\t\t\t<th>";
            // line 136
            echo gettext("Board");
            echo "</th>
\t\t\t<th>";
            // line 137
            echo gettext("Action");
            echo "</th>
\t\t</tr>
\t\t";
            // line 139
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["results"]) ? $context["results"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 140
                echo "\t\t\t<tr>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t";
                // line 142
                if ($this->getAttribute((isset($context["log"]) ? $context["log"] : null), "username")) {
                    // line 143
                    echo "\t\t\t\t\t\t<a href=\"?/log:";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "username"));
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "username"));
                    echo "</a>
\t\t\t\t\t";
                } elseif (($this->getAttribute((isset($context["log"]) ? $context["log"] : null), "mod") == (-1))) {
                    // line 145
                    echo "\t\t\t\t\t\t<em>system</em>
\t\t\t\t\t";
                } else {
                    // line 147
                    echo "\t\t\t\t\t\t<em>";
                    echo gettext("deleted?");
                    echo "</em>
\t\t\t\t\t";
                }
                // line 149
                echo "\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t<a href=\"?/IP/";
                // line 151
                echo $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "ip");
                echo "\">";
                echo $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "ip");
                echo "</a>
\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t<span title=\"";
                // line 154
                echo twig_date_filter($this->getAttribute((isset($context["log"]) ? $context["log"] : null), "time"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
                echo "\">";
                echo ago($this->getAttribute((isset($context["log"]) ? $context["log"] : null), "time"));
                echo "</span>
\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t";
                // line 157
                if ($this->getAttribute((isset($context["log"]) ? $context["log"] : null), "board")) {
                    // line 158
                    echo "\t\t\t\t\t\t<a href=\"?/";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_path"), $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "board"));
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_index");
                    echo "\">";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_abbreviation"), $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "board"));
                    echo "</a>
\t\t\t\t\t";
                } else {
                    // line 160
                    echo "\t\t\t\t\t\t-
\t\t\t\t\t";
                }
                // line 162
                echo "\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t";
                // line 164
                echo $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "text");
                echo "
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 168
            echo "\t</table>
";
        }
        // line 170
        echo "
";
        // line 171
        if (((isset($context["search_type"]) ? $context["search_type"] : null) == "posts")) {
            // line 172
            echo "\t<table class=\"modlog\" style=\"word-wrap: break-word;\">
\t\t<tr>
\t\t\t<th>Time</th>
\t\t\t<th>Board</th>
\t\t\t<th>ID</th>
\t\t\t<th>Thread</th>
\t\t\t<th>IP</th>
\t\t\t<th>Name</th>
\t\t\t<th>Subject</th>
\t\t\t<th>File</th>
\t\t\t<th>Body (snippet)</th>
\t\t</tr>
\t\t";
            // line 184
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["results"]) ? $context["results"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 185
                echo "\t\t\t<tr>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t<small>";
                // line 187
                echo ago($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "time"));
                echo " ago</small>
\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t<a href=\"?/";
                // line 190
                echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_path"), $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "board"));
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_index");
                echo "\">";
                echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_abbreviation"), $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "board"));
                echo "</a>
\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t";
                // line 193
                if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thread")) {
                    // line 194
                    echo "\t\t\t\t\t\t";
                    $context["thread"] = $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thread");
                    // line 195
                    echo "\t\t\t\t\t";
                } else {
                    // line 196
                    echo "\t\t\t\t\t\t";
                    $context["thread"] = $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
                    // line 197
                    echo "\t\t\t\t\t";
                }
                // line 198
                echo "\t\t\t\t\t<a href=\"?/";
                echo (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "board") . "/") . $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "dir"), "res"));
                echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_page"), (isset($context["thread"]) ? $context["thread"] : null));
                echo "#";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
                echo "\">
\t\t\t\t\t\t";
                // line 199
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
                echo "
\t\t\t\t\t</a>
\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t<small>
\t\t\t\t\t\t";
                // line 204
                if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thread")) {
                    // line 205
                    echo "\t\t\t\t\t\t\t";
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thread");
                    echo "
\t\t\t\t\t\t";
                } else {
                    // line 207
                    echo "\t\t\t\t\t\t\t(OP)
\t\t\t\t\t\t";
                }
                // line 209
                echo "\t\t\t\t\t</small>
\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t";
                // line 212
                if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "show_ip"), $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "board"))) {
                    // line 213
                    echo "\t\t\t\t\t\t<a href=\"?/IP/";
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "ip");
                    echo "\">
\t\t\t\t\t\t\t";
                    // line 214
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "ip");
                    echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t";
                } else {
                    // line 217
                    echo "\t\t\t\t\t\t<em>hidden</em>
\t\t\t\t\t";
                }
                // line 219
                echo "\t\t\t\t</td>
\t\t\t\t<td style=\"max-width:100px\">
\t\t\t\t\t<small>
\t\t\t\t\t\t";
                // line 222
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "email")) > 0)) {
                    // line 223
                    echo "\t\t\t\t\t\t\t";
                    // line 224
                    echo "\t\t\t\t\t\t\t<a class=\"email\" href=\"mailto:";
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "email");
                    echo "\">
\t\t\t\t\t\t";
                }
                // line 226
                echo "\t\t\t\t\t\t";
                $context["capcode"] = capcode($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "capcode"));
                // line 227
                echo "\t\t\t\t\t\t<span ";
                if ($this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "name")) {
                    echo "style=\"";
                    echo $this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "name");
                    echo "\" ";
                }
                echo "class=\"name\">";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "name");
                echo "</span>
\t\t\t\t\t\t";
                // line 228
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "trip")) > 0)) {
                    // line 229
                    echo "\t\t\t\t\t\t\t<span ";
                    if ($this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "trip")) {
                        echo "style=\"";
                        echo $this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "trip");
                        echo "\" ";
                    }
                    echo "class=\"trip\">";
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "trip");
                    echo "</span>
\t\t\t\t\t\t";
                }
                // line 231
                echo "\t\t\t\t\t\t";
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "email")) > 0)) {
                    // line 232
                    echo "\t\t\t\t\t\t\t";
                    // line 233
                    echo "\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
                }
                // line 235
                echo "\t\t\t\t\t\t";
                if ((isset($context["capcode"]) ? $context["capcode"] : null)) {
                    // line 236
                    echo "\t\t\t\t\t\t\t";
                    echo $this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "cap");
                    echo "
\t\t\t\t\t\t";
                }
                // line 238
                echo "\t\t\t\t\t</small>
\t\t\t\t</td>
\t\t\t\t<td style=\"max-width:250px\">
\t\t\t\t\t";
                // line 241
                if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject")) {
                    // line 242
                    echo "\t\t\t\t\t\t<small>";
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject");
                    echo "</small>
\t\t\t\t\t";
                } else {
                    // line 244
                    echo "\t\t\t\t\t\t&ndash;
\t\t\t\t\t";
                }
                // line 246
                echo "\t\t\t\t</td>
\t\t\t\t<td style=\"max-width:200px\">
\t\t\t\t\t";
                // line 248
                if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file")) {
                    // line 249
                    echo "\t\t\t\t\t\t<small>";
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename");
                    echo " (";
                    echo format_bytes($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filesize"));
                    echo ")</small>
\t\t\t\t\t";
                } else {
                    // line 251
                    echo "\t\t\t\t\t\t&ndash;
\t\t\t\t\t";
                }
                // line 253
                echo "\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<small><em>";
                // line 255
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "snippet");
                echo "</em></small>
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 259
            echo "\t</table>
";
        }
        // line 261
        echo "
";
        // line 262
        if (((isset($context["result_count"]) ? $context["result_count"] : null) > count((isset($context["results"]) ? $context["results"] : null)))) {
            // line 263
            echo "\t<p class=\"unimportant\" style=\"text-align:center;word-wrap:break-word\">
\t\t";
            // line 264
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(0, (((isset($context["result_count"]) ? $context["result_count"] : null) - 1) / $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "search_page"))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 265
                echo "\t\t\t<a href=\"?/search/";
                echo (isset($context["search_type"]) ? $context["search_type"] : null);
                echo "/";
                echo (isset($context["search_query_escaped"]) ? $context["search_query_escaped"] : null);
                echo "/";
                echo ((isset($context["i"]) ? $context["i"] : null) + 1);
                echo "\">[";
                echo ((isset($context["i"]) ? $context["i"] : null) + 1);
                echo "]</a> 
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 267
            echo "\t</p>
";
        }
    }

    public function getTemplateName()
    {
        return "mod/search_results.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  720 => 267,  705 => 265,  701 => 264,  698 => 263,  696 => 262,  693 => 261,  689 => 259,  679 => 255,  675 => 253,  671 => 251,  663 => 249,  661 => 248,  657 => 246,  653 => 244,  647 => 242,  645 => 241,  640 => 238,  634 => 236,  631 => 235,  627 => 233,  625 => 232,  622 => 231,  610 => 229,  608 => 228,  597 => 227,  594 => 226,  588 => 224,  586 => 223,  584 => 222,  579 => 219,  575 => 217,  569 => 214,  564 => 213,  562 => 212,  557 => 209,  553 => 207,  547 => 205,  545 => 204,  537 => 199,  529 => 198,  526 => 197,  523 => 196,  520 => 195,  517 => 194,  515 => 193,  506 => 190,  500 => 187,  496 => 185,  492 => 184,  478 => 172,  476 => 171,  473 => 170,  469 => 168,  459 => 164,  455 => 162,  451 => 160,  442 => 158,  440 => 157,  432 => 154,  424 => 151,  420 => 149,  414 => 147,  410 => 145,  402 => 143,  400 => 142,  396 => 140,  392 => 139,  387 => 137,  383 => 136,  379 => 135,  375 => 134,  371 => 133,  367 => 131,  365 => 130,  362 => 129,  358 => 127,  350 => 124,  344 => 122,  340 => 120,  337 => 119,  334 => 118,  330 => 116,  326 => 114,  323 => 113,  315 => 111,  312 => 110,  310 => 109,  306 => 107,  303 => 106,  300 => 105,  297 => 104,  294 => 103,  292 => 102,  288 => 100,  285 => 99,  279 => 97,  277 => 96,  272 => 95,  266 => 93,  264 => 92,  260 => 90,  254 => 88,  250 => 86,  248 => 85,  241 => 81,  237 => 80,  232 => 77,  226 => 76,  220 => 74,  218 => 73,  214 => 71,  210 => 69,  204 => 67,  202 => 66,  198 => 64,  192 => 62,  184 => 60,  182 => 59,  174 => 57,  170 => 56,  165 => 54,  161 => 53,  157 => 52,  153 => 51,  149 => 50,  145 => 49,  141 => 48,  137 => 47,  133 => 45,  131 => 44,  128 => 43,  124 => 41,  114 => 37,  108 => 34,  104 => 32,  98 => 30,  90 => 28,  88 => 27,  80 => 24,  76 => 22,  72 => 21,  67 => 19,  63 => 18,  59 => 17,  55 => 16,  51 => 14,  49 => 13,  40 => 11,  34 => 7,  32 => 6,  25 => 2,  22 => 1,);
    }
}
