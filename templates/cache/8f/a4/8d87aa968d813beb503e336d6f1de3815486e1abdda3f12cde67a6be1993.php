<?php

/* mod/user.html */
class __TwigTemplate_8fa48d87aa968d813beb503e336d6f1de3815486e1abdda3f12cde67a6be1993 extends Twig_Template
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
        if ((isset($context["new"]) ? $context["new"] : null)) {
            // line 2
            echo "\t";
            $context["action"] = "?/users/new";
        } else {
            // line 4
            echo "\t";
            $context["action"] = ("?/users/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id"));
        }
        // line 6
        echo "
<form action=\"";
        // line 7
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\">
\t<input type=\"hidden\" name=\"token\" value=\"";
        // line 8
        echo (isset($context["token"]) ? $context["token"] : null);
        echo "\">
\t<table>
\t\t<tr>
\t\t\t<th>";
        // line 11
        echo gettext("Username");
        echo "</th>
\t\t\t<td>
\t\t\t\t";
        // line 13
        if (((isset($context["new"]) ? $context["new"] : null) || twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "editusers")))) {
            // line 14
            echo "\t\t\t\t\t<input size=\"20\" maxlength=\"30\" type=\"text\" name=\"username\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"));
            echo "\" autocomplete=\"off\">
\t\t\t\t";
        } else {
            // line 16
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"));
            echo "
\t\t\t\t";
        }
        // line 18
        echo "\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<th>";
        // line 21
        echo gettext("Password");
        if ((!(isset($context["new"]) ? $context["new"] : null))) {
            echo " <small style=\"font-weight:normal\">(";
            echo gettext("new; optional");
            echo ")</small>";
        }
        echo "</th>
\t\t\t<td>
\t\t\t\t";
        // line 23
        if (((isset($context["new"]) ? $context["new"] : null) || (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "editusers")) || (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "change_password")) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id") == $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "id")))))) {
            // line 24
            echo "\t\t\t\t\t<input size=\"20\" maxlength=\"30\" type=\"password\" name=\"password\" value=\"\" autocomplete=\"off\">
\t\t\t\t";
        } else {
            // line 26
            echo "\t\t\t\t\t-
\t\t\t\t";
        }
        // line 28
        echo "\t\t\t</td>
\t\t</tr>
\t\t";
        // line 30
        if ((isset($context["new"]) ? $context["new"] : null)) {
            // line 31
            echo "\t\t\t<tr>
\t\t\t\t<th>";
            // line 32
            echo gettext("Group");
            echo "</th>
\t\t\t\t<td>
\t\t\t\t\t<ul style=\"padding:5px 8px;list-style:none\">
\t\t\t\t\t\t";
            // line 35
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "groups"));
            foreach ($context['_seq'] as $context["group_value"] => $context["group_name"]) {
                if (((isset($context["group_name"]) ? $context["group_name"] : null) != "Disabled")) {
                    // line 36
                    echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"type\" id=\"group_";
                    // line 37
                    echo (isset($context["group_name"]) ? $context["group_name"] : null);
                    echo "\" value=\"";
                    echo (isset($context["group_value"]) ? $context["group_value"] : null);
                    echo "\"> 
\t\t\t\t\t\t\t\t<label for=\"group_";
                    // line 38
                    echo (isset($context["group_name"]) ? $context["group_name"] : null);
                    echo "\">";
                    echo gettext((isset($context["group_name"]) ? $context["group_name"] : null));
                    echo "</label>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['group_value'], $context['group_name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "\t\t\t\t\t</ul>
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
        }
        // line 45
        echo "\t\t<tr>
\t\t\t<th>";
        // line 46
        echo gettext("Boards");
        echo "</th>
\t\t\t<td>
\t\t\t\t<ul style=\"padding:0 5px;list-style:none\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<input type=\"checkbox\" id=\"allboards\" name=\"allboards\"
\t\t\t\t\t\t";
        // line 51
        if (twig_in_filter("*", $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "boards"))) {
            echo " checked";
        }
        // line 52
        echo "\t\t\t\t\t\t";
        if ((!twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "editusers")))) {
            // line 53
            echo "\t\t\t\t\t\t disabled
\t\t\t\t\t\t";
        }
        // line 55
        echo "\t\t\t\t\t\t> 
\t\t\t\t\t\t<label for=\"allboards\">\"*\" - ";
        // line 56
        echo gettext("All boards");
        echo "</label>
\t\t\t\t\t</li>
\t\t\t\t\t";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["boards"]) ? $context["boards"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["board"]) {
            // line 59
            echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"board_";
            // line 60
            echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri");
            echo "\" name=\"board_";
            echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri");
            echo "\"
\t\t\t\t\t\t\t\t";
            // line 61
            if (twig_in_filter($this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"), $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "boards"))) {
                echo " checked";
            }
            // line 62
            echo "\t\t\t\t\t\t\t\t";
            if ((!twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "editusers")))) {
                // line 63
                echo "\t\t\t\t\t\t\t\t disabled
\t\t\t\t\t\t\t\t";
            }
            // line 65
            echo "\t\t\t\t\t\t\t\t> 
\t\t\t\t\t\t\t<label for=\"board_";
            // line 66
            echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri");
            echo "\">
\t\t\t\t\t\t\t\t";
            // line 67
            echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_abbreviation"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"));
            echo "
\t\t\t\t\t\t\t\t - 
\t\t\t\t\t\t\t\t";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "title"));
            echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['board'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "\t\t\t\t</ul>
\t\t\t</td>
\t\t</tr>
\t</table>
\t
\t<ul style=\"padding:0;text-align:center;list-style:none\">
\t\t";
        // line 79
        if ((isset($context["new"]) ? $context["new"] : null)) {
            // line 80
            echo "\t\t\t<li><input type=\"submit\" value=\"";
            echo gettext("Create user");
            echo "\"></li>
\t\t";
        } else {
            // line 82
            echo "\t\t\t<li><input type=\"submit\" value=\"";
            echo gettext("Save changes");
            echo "\"></li>
\t\t\t";
            // line 83
            if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "deleteusers"))) {
                // line 84
                echo "\t\t\t\t<li><input name=\"delete\" onclick=\"return confirm('Are you sure you want to permanently delete this user?');\" type=\"submit\" value=\"";
                echo gettext("Delete user");
                echo "\"></li>
\t\t\t";
            }
            // line 86
            echo "\t\t";
        }
        // line 87
        echo "\t</ul>
</form>

";
        // line 90
        if ((count((isset($context["logs"]) ? $context["logs"] : null)) > 0)) {
            // line 91
            echo "\t<table class=\"modlog\" style=\"width:600px\">
\t\t<tr>
\t\t\t<th>";
            // line 93
            echo gettext("IP address");
            echo "</th>\t\t\t
\t\t\t<th>";
            // line 94
            echo gettext("Time");
            echo "</th>
\t\t\t<th>";
            // line 95
            echo gettext("Board");
            echo "</th>
\t\t\t<th>";
            // line 96
            echo gettext("Action");
            echo "</th>
\t\t</tr>
\t\t";
            // line 98
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 99
                echo "\t\t\t<tr>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t<a href=\"?/IP/";
                // line 101
                echo $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "ip");
                echo "\">";
                echo $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "ip");
                echo "</a>
\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t<span title=\"";
                // line 104
                echo twig_date_filter($this->getAttribute((isset($context["log"]) ? $context["log"] : null), "time"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
                echo "\">";
                echo ago($this->getAttribute((isset($context["log"]) ? $context["log"] : null), "time"));
                echo "</span>
\t\t\t\t</td>
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t";
                // line 107
                if ($this->getAttribute((isset($context["log"]) ? $context["log"] : null), "board")) {
                    // line 108
                    echo "\t\t\t\t\t\t<a href=\"?/";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_path"), $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "board"));
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_index");
                    echo "\">";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_abbreviation"), $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "board"));
                    echo "</a>
\t\t\t\t\t";
                } else {
                    // line 110
                    echo "\t\t\t\t\t\t-
\t\t\t\t\t";
                }
                // line 112
                echo "\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t";
                // line 114
                echo $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "text");
                echo "
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 118
            echo "\t</table>
\t<p style=\"text-align:center\" class=\"unimportant\">
\t\t<a href=\"?/log:";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"));
            echo "\">";
            echo gettext("View more logs for this user.");
            echo "</a>
\t</p>
";
        }
        // line 123
        echo "
";
    }

    public function getTemplateName()
    {
        return "mod/user.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  337 => 123,  329 => 120,  325 => 118,  315 => 114,  311 => 112,  307 => 110,  298 => 108,  296 => 107,  288 => 104,  280 => 101,  276 => 99,  272 => 98,  267 => 96,  263 => 95,  259 => 94,  255 => 93,  251 => 91,  249 => 90,  244 => 87,  241 => 86,  235 => 84,  233 => 83,  228 => 82,  222 => 80,  220 => 79,  212 => 73,  202 => 69,  197 => 67,  193 => 66,  190 => 65,  186 => 63,  183 => 62,  179 => 61,  173 => 60,  170 => 59,  166 => 58,  161 => 56,  158 => 55,  154 => 53,  151 => 52,  147 => 51,  139 => 46,  136 => 45,  130 => 41,  118 => 38,  112 => 37,  109 => 36,  104 => 35,  98 => 32,  95 => 31,  93 => 30,  89 => 28,  85 => 26,  81 => 24,  79 => 23,  69 => 21,  64 => 18,  58 => 16,  52 => 14,  50 => 13,  45 => 11,  39 => 8,  35 => 7,  32 => 6,  28 => 4,  24 => 2,  22 => 1,);
    }
}
