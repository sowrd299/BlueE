<?php

/* mod/ban_list.html */
class __TwigTemplate_f21289f18c30f2aa7a63b6b1b451eea802e37a8b1d5d16b0e4553161a58104fc extends Twig_Template
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
        if ((count((isset($context["bans"]) ? $context["bans"] : null)) == 0)) {
            // line 2
            echo "\t<p style=\"text-align:center\" class=\"unimportant\">(";
            echo gettext("There are no active bans.");
            echo ")</p>
";
        } else {
            // line 4
            echo "\t<form action=\"?/bans\" method=\"post\">
\t\t<input type=\"hidden\" name=\"token\" value=\"";
            // line 5
            echo (isset($context["token"]) ? $context["token"] : null);
            echo "\">
\t\t<table class=\"mod\" style=\"width:100%\">
\t\t\t<tr>
\t\t\t\t<th>";
            // line 8
            echo gettext("IP address/mask");
            echo "</th>
\t\t\t\t<th>";
            // line 9
            echo gettext("Reason");
            echo "</th>
\t\t\t\t<th>";
            // line 10
            echo gettext("Board");
            echo "</th>
\t\t\t\t<th>";
            // line 11
            echo gettext("Set");
            echo "</th>
\t\t\t\t<th>";
            // line 12
            echo gettext("Duration");
            echo "</th>
\t\t\t\t<th>";
            // line 13
            echo gettext("Expires");
            echo "</th>
\t\t\t\t<th>";
            // line 14
            echo gettext("Seen");
            echo "</th>
\t\t\t\t<th>";
            // line 15
            echo gettext("Staff");
            echo "</th>
\t\t\t</tr>
\t\t\t";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["bans"]) ? $context["bans"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["ban"]) {
                // line 18
                echo "\t\t\t\t<tr";
                if ((($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") != 0) && ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") < time()))) {
                    echo " style=\"text-decoration:line-through\"";
                }
                echo ">
\t\t\t\t\t<td style=\"white-space: nowrap\">
\t\t\t\t\t\t<input type=\"checkbox\" name=\"ban_";
                // line 20
                echo $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "id");
                echo "\"> 
\t\t\t\t\t\t";
                // line 21
                if ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "single_addr")) {
                    // line 22
                    echo "\t\t\t\t\t\t\t<a href=\"?/IP/";
                    echo $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "mask");
                    echo "\">";
                    echo $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "mask");
                    echo "</a>
\t\t\t\t\t\t";
                } else {
                    // line 24
                    echo "\t\t\t\t\t\t\t";
                    echo $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "mask");
                    echo "
\t\t\t\t\t\t";
                }
                // line 26
                echo "\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
                // line 28
                if ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "reason")) {
                    // line 29
                    echo "\t\t\t\t\t\t\t";
                    echo $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "reason");
                    echo "
\t\t\t\t\t\t";
                } else {
                    // line 31
                    echo "\t\t\t\t\t\t\t-
\t\t\t\t\t\t";
                }
                // line 33
                echo "\t\t\t\t\t</td>
\t\t\t\t\t<td  style=\"white-space: nowrap\">
\t\t\t\t\t\t";
                // line 35
                if ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "board")) {
                    // line 36
                    echo "\t\t\t\t\t\t\t";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_abbreviation"), $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "board"));
                    echo "
\t\t\t\t\t\t";
                } else {
                    // line 38
                    echo "\t\t\t\t\t\t\t<em>";
                    echo gettext("all boards");
                    echo "</em>
\t\t\t\t\t\t";
                }
                // line 39
                echo "\t\t\t\t\t
\t\t\t\t\t</td>
\t\t\t\t\t<td style=\"white-space: nowrap\">
\t\t\t\t\t\t<span title=\"";
                // line 42
                echo twig_date_filter($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "created"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
                echo "\">
\t\t\t\t\t\t\t";
                // line 43
                echo ago($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "created"));
                echo " ago
\t\t\t\t\t\t</span>
\t\t\t\t\t</td>
\t\t\t\t\t<td style=\"white-space: nowrap\">
\t\t\t\t\t\t";
                // line 47
                if (($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") == 0)) {
                    // line 48
                    echo "\t\t\t\t\t\t\t-
\t\t\t\t\t\t";
                } else {
                    // line 50
                    echo "\t\t\t\t\t\t\t";
                    echo until((($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") - $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "created")) + time()));
                    echo "
\t\t\t\t\t\t";
                }
                // line 52
                echo "\t\t\t\t\t</td>
\t\t\t\t\t<td style=\"white-space: nowrap\">
\t\t\t\t\t\t";
                // line 54
                if (($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") == 0)) {
                    // line 55
                    echo "\t\t\t\t\t\t\t<em>";
                    echo gettext("never");
                    echo "</em>
\t\t\t\t\t\t";
                } else {
                    // line 57
                    echo "\t\t\t\t\t\t\t";
                    echo twig_date_filter($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
                    echo "
\t\t\t\t\t\t\t";
                    // line 58
                    if (($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires") > time())) {
                        // line 59
                        echo "\t\t\t\t\t\t\t\t <small>(in ";
                        echo until($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "expires"));
                        echo ")</small>
\t\t\t\t\t\t\t";
                    }
                    // line 61
                    echo "\t\t\t\t\t\t";
                }
                // line 62
                echo "\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
                // line 64
                if ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "seen")) {
                    // line 65
                    echo "\t\t\t\t\t\t\t";
                    echo gettext("Yes");
                    // line 66
                    echo "\t\t\t\t\t\t";
                } else {
                    // line 67
                    echo "\t\t\t\t\t\t\t";
                    echo gettext("No");
                    // line 68
                    echo "\t\t\t\t\t\t";
                }
                // line 69
                echo "\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
                // line 71
                if ($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "username")) {
                    // line 72
                    echo "\t\t\t\t\t\t\t";
                    if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "view_banstaff"))) {
                        // line 73
                        echo "\t\t\t\t\t\t\t\t<a href=\"?/new_PM/";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "username"));
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "username"));
                        echo "</a>
\t\t\t\t\t\t\t";
                    } else {
                        // line 75
                        echo "\t\t\t\t\t\t\t\t";
                        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "view_banquestionmark"))) {
                            // line 76
                            echo "\t\t\t\t\t\t\t\t\t<em>?</em>
\t\t\t\t\t\t\t\t";
                        } else {
                            // line 78
                            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                        }
                        // line 80
                        echo "\t\t\t\t\t\t\t";
                    }
                    // line 81
                    echo "\t\t\t\t\t\t";
                } elseif (($this->getAttribute((isset($context["ban"]) ? $context["ban"] : null), "creator") == (-1))) {
                    // line 82
                    echo "\t\t\t\t\t\t\t<em>system</em>
\t\t\t\t\t\t";
                } else {
                    // line 84
                    echo "\t\t\t\t\t\t\t<em>";
                    echo gettext("deleted?");
                    echo "</em>
\t\t\t\t\t\t";
                }
                // line 86
                echo "\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ban'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            echo "\t\t</table>
\t\t
\t\t<p style=\"text-align:center\">
\t\t\t<input type=\"submit\" name=\"unban\" value=\"";
            // line 92
            echo gettext("Unban selected");
            echo "\">
\t\t</p>
\t</form>
";
        }
        // line 96
        echo "
";
        // line 97
        if (((isset($context["count"]) ? $context["count"] : null) > count((isset($context["bans"]) ? $context["bans"] : null)))) {
            // line 98
            echo "\t<p class=\"unimportant\" style=\"text-align:center;word-wrap:break-word\">
\t\t";
            // line 99
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(0, (((isset($context["count"]) ? $context["count"] : null) - 1) / $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "modlog_page"))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 100
                echo "\t\t\t<a href=\"?/bans/";
                echo ((isset($context["i"]) ? $context["i"] : null) + 1);
                echo "\">[";
                echo ((isset($context["i"]) ? $context["i"] : null) + 1);
                echo "]</a> 
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            echo "\t</p>
";
        }
        // line 104
        echo "
";
    }

    public function getTemplateName()
    {
        return "mod/ban_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  303 => 104,  299 => 102,  288 => 100,  284 => 99,  281 => 98,  279 => 97,  276 => 96,  269 => 92,  264 => 89,  256 => 86,  250 => 84,  246 => 82,  243 => 81,  240 => 80,  236 => 78,  232 => 76,  229 => 75,  221 => 73,  218 => 72,  216 => 71,  212 => 69,  209 => 68,  206 => 67,  203 => 66,  200 => 65,  198 => 64,  194 => 62,  191 => 61,  185 => 59,  183 => 58,  178 => 57,  172 => 55,  170 => 54,  166 => 52,  160 => 50,  156 => 48,  154 => 47,  147 => 43,  143 => 42,  138 => 39,  132 => 38,  126 => 36,  124 => 35,  120 => 33,  116 => 31,  110 => 29,  108 => 28,  104 => 26,  98 => 24,  90 => 22,  88 => 21,  84 => 20,  76 => 18,  72 => 17,  67 => 15,  63 => 14,  59 => 13,  55 => 12,  51 => 11,  47 => 10,  43 => 9,  39 => 8,  33 => 5,  30 => 4,  24 => 2,  22 => 1,);
    }
}
