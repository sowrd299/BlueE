<?php

/* mod/users.html */
class __TwigTemplate_29c13af5af70e65714132b30fc4841ec33e46dc16f0db9103d0b47c34be9d8c2 extends Twig_Template
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
        echo "<table class=\"modlog\" style=\"width:auto\">
\t<tr>
\t\t<th>";
        // line 3
        echo gettext("ID");
        echo "</th>
\t\t<th>";
        // line 4
        echo gettext("Username");
        echo "</th>
\t\t<th>";
        // line 5
        echo gettext("Type");
        echo "</th>
\t\t<th>";
        // line 6
        echo gettext("Boards");
        echo "</th>
\t\t";
        // line 7
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "modlog"))) {
            // line 8
            echo "\t\t\t<th>";
            echo gettext("Last action");
            echo "</th>
\t\t";
        }
        // line 10
        echo "\t\t<th>&hellip;</th>
\t</tr>
\t
\t";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 14
            echo "\t\t<tr>
\t\t\t<td><small>";
            // line 15
            echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id");
            echo "</small></td>
\t\t\t<td>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"));
            echo "</td>
\t\t\t<td>
\t\t\t\t";
            // line 18
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "groups"), $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "type"), array(), "array")) {
                // line 19
                echo "\t\t\t\t\t";
                echo $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "groups"), $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "type"), array(), "array");
                echo "
\t\t\t\t";
            } else {
                // line 21
                echo "\t\t\t\t\t<em>";
                echo gettext("Unknown");
                echo "</em> (";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "type");
                echo ")
\t\t\t\t";
            }
            // line 23
            echo "\t\t\t</td>
\t\t\t<td>
\t\t\t\t";
            // line 25
            if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "boards") == "")) {
                // line 26
                echo "\t\t\t\t\t<em>";
                echo gettext("none");
                echo "</em>
\t\t\t\t";
            } elseif (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "boards") == "*")) {
                // line 28
                echo "\t\t\t\t\t<em>";
                echo gettext("all boards");
                echo "</em>
\t\t\t\t";
            } else {
                // line 30
                echo "\t\t\t\t\t";
                // line 31
                echo "\t\t\t\t\t";
                $context["boards"] = twig_split_filter($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "boards"), ",");
                // line 32
                echo "\t\t\t\t\t";
                $context["_boards"] = array();
                // line 33
                echo "\t\t\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["boards"]) ? $context["boards"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["board"]) {
                    // line 34
                    echo "\t\t\t\t\t\t";
                    $context["_boards"] = twig_push_filter((isset($context["_boards"]) ? $context["_boards"] : null), ((((isset($context["board"]) ? $context["board"] : null) == "*")) ? ("*") : (sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_abbreviation"), (isset($context["board"]) ? $context["board"] : null)))));
                    // line 35
                    echo "\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['board'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                echo "\t\t\t\t\t";
                $context["_boards"] = twig_sort_filter((isset($context["_boards"]) ? $context["_boards"] : null));
                // line 37
                echo "\t\t\t\t\t";
                echo twig_join_filter((isset($context["_boards"]) ? $context["_boards"] : null), ", ");
                echo "
\t\t\t\t";
            }
            // line 39
            echo "\t\t\t</td>
\t\t\t";
            // line 40
            if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "modlog"))) {
                // line 41
                echo "\t\t\t\t<td>
\t\t\t\t\t";
                // line 42
                if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last")) {
                    // line 43
                    echo "\t\t\t\t\t\t<span title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "action"));
                    echo "\">";
                    echo ago($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last"));
                    echo "</span>
\t\t\t\t\t";
                } else {
                    // line 45
                    echo "\t\t\t\t\t\t<em>";
                    echo gettext("never");
                    echo "</em>
\t\t\t\t\t";
                }
                // line 47
                echo "\t\t\t\t</td>
\t\t\t";
            }
            // line 49
            echo "\t\t\t<td>
\t\t\t\t";
            // line 50
            if ((twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "promoteusers")) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "type") < twig_constant(twig_last($this->env, twig_slice($this->env, $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "groups"), 0, (-1))))))) {
                // line 51
                echo "\t\t\t\t\t<a style=\"float:left;text-decoration:none\" href=\"?/users/";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id");
                echo "/promote/";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "promote_token");
                echo "\" title=\"";
                echo gettext("Promote");
                echo "\">&#9650;</a> 
\t\t\t\t";
            }
            // line 53
            echo "\t\t\t\t";
            if ((twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "promoteusers")) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "type") > twig_constant(twig_first($this->env, $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "groups")))))) {
                // line 54
                echo "\t\t\t\t\t<a style=\"float:left;text-decoration:none\" href=\"?/users/";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id");
                echo "/demote/";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "demote_token");
                echo "\" title=\"";
                echo gettext("Demote");
                echo "\"";
                if (($this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "id") == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id"))) {
                    echo " onclick=\"return confirm('";
                    echo gettext("Are you sure you want to demote yourself?");
                    echo "')\"";
                }
                echo ">&#9660;</a> 
\t\t\t\t";
            }
            // line 56
            echo "\t\t\t\t";
            if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "modlog"))) {
                // line 57
                echo "\t\t\t\t\t<a class=\"unimportant\" style=\"margin-left:5px;float:right\" href=\"?/log:";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"));
                echo "\">[";
                echo gettext("log");
                echo "]</a> 
\t\t\t\t";
            }
            // line 59
            echo "\t\t\t\t";
            if ((twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "editusers")) || (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "change_password")) && ($this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "id") == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id"))))) {
                // line 60
                echo "\t\t\t\t\t<a class=\"unimportant\" style=\"margin-left:5px;float:right\" href=\"?/users/";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id");
                echo "\">[";
                echo gettext("edit");
                echo "]</a> 
\t\t\t\t";
            }
            // line 62
            echo "\t\t\t\t";
            if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "create_pm"))) {
                // line 63
                echo "\t\t\t\t\t<a class=\"unimportant\" style=\"margin-left:5px;float:right\" href=\"?/new_PM/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"));
                echo "\">[";
                echo gettext("PM");
                echo "]</a>
\t\t\t\t";
            }
            // line 65
            echo "\t\t\t</td>
\t\t</tr>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "</table>

";
        // line 70
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "createusers"))) {
            // line 71
            echo "\t<p style=\"text-align:center\">
\t\t<a href=\"?/users/new\">Create a new user</a>
\t</p>
";
        }
        // line 75
        echo "
";
    }

    public function getTemplateName()
    {
        return "mod/users.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 75,  245 => 71,  243 => 70,  239 => 68,  231 => 65,  223 => 63,  220 => 62,  212 => 60,  209 => 59,  201 => 57,  198 => 56,  182 => 54,  179 => 53,  169 => 51,  167 => 50,  164 => 49,  160 => 47,  154 => 45,  146 => 43,  144 => 42,  141 => 41,  139 => 40,  136 => 39,  130 => 37,  127 => 36,  121 => 35,  118 => 34,  113 => 33,  110 => 32,  107 => 31,  105 => 30,  99 => 28,  93 => 26,  91 => 25,  87 => 23,  79 => 21,  73 => 19,  71 => 18,  66 => 16,  62 => 15,  59 => 14,  55 => 13,  50 => 10,  44 => 8,  42 => 7,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  22 => 1,);
    }
}
