<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* database/designer/table_list.twig */
class __TwigTemplate_14521c38045261407b81ea7222bdc0915d84289fb2c8b4f97e6fe9340e65a218 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div id=\"layer_menu\" class=\"hide\">
    <div class=\"center\">
        <a href=\"#\" class=\"M_butt\" target=\"_self\" >
            <img title=\"";
        // line 4
        echo _gettext("Hide/Show all");
        echo "\"
                alt=\"v\"
                id=\"key_HS_all\"
                src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/downarrow1.png"], "method"), "html", null, true);
        echo "\"
                data-down=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/downarrow1.png"], "method"), "html", null, true);
        echo "\"
                data-right=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/rightarrow1.png"], "method"), "html", null, true);
        echo "\" />
        </a>
        <a href=\"#\" class=\"M_butt\" target=\"_self\" >
            <img alt=\"v\"
                id=\"key_HS\"
                title=\"";
        // line 14
        echo _gettext("Hide/Show tables with no relationship");
        echo "\"
                src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/downarrow2.png"], "method"), "html", null, true);
        echo "\"
                data-down=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/downarrow2.png"], "method"), "html", null, true);
        echo "\"
                data-right=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/rightarrow2.png"], "method"), "html", null, true);
        echo "\" />
        </a>
    </div>
    <div id=\"id_scroll_tab\" class=\"scroll_tab\">
        <table width=\"100%\" style=\"padding-left: 3px;\">
            ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, (twig_length_filter($this->env, ($context["table_names"] ?? null)) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 23
            echo "                <tr>
                    <td title=\"";
            // line 24
            echo _gettext("Structure");
            echo "\"
                        width=\"1px\"
                        class=\"L_butt2_1\">
                        <img alt=\"\"
                            table_name=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute(($context["table_names_small_url"] ?? null), $context["i"], [], "array"), "html", null, true);
            echo "\"
                            class=\"scroll_tab_struct\"
                            src=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/exec.png"], "method"), "html", null, true);
            echo "\"/>
                    </td>
                    <td width=\"1px\">
                        <input class=\"scroll_tab_checkbox\"
                            title=\"";
            // line 34
            echo _gettext("Hide");
            echo "\"
                            id=\"check_vis_";
            // line 35
            echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute(($context["table_names_url"] ?? null), $context["i"], [], "array")), "html", null, true);
            echo "\"
                            style=\"margin:0;\"
                            type=\"checkbox\"
                            value=\"";
            // line 38
            echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute(($context["table_names_url"] ?? null), $context["i"], [], "array")), "html", null, true);
            echo "\"
                            ";
            // line 39
            if ((($this->getAttribute(($context["tab_pos"] ?? null), $this->getAttribute(($context["table_names"] ?? null), $context["i"], [], "array"), [], "array", true, true) && $this->getAttribute($this->getAttribute(            // line 40
($context["tab_pos"] ?? null), $this->getAttribute(($context["table_names"] ?? null), $context["i"], [], "array"), [], "array"), "H", [], "array")) || (            // line 41
($context["display_page"] ?? null) ==  -1))) {
                // line 42
                echo "checked=\"checked\"";
            }
            // line 43
            echo " />
                    </td>
                    <td class=\"designer_Tabs\"
                        designer_url_table_name=\"";
            // line 46
            echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute(($context["table_names_url"] ?? null), $context["i"], [], "array")), "html", null, true);
            echo "\">
                        ";
            // line 47
            echo $this->getAttribute(($context["table_names_out"] ?? null), $context["i"], [], "array");
            echo "
                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "        </table>
    </div>
    ";
        // line 54
        echo "    <div class=\"center\">
        ";
        // line 55
        echo _gettext("Number of tables:");
        echo " ";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["table_names"] ?? null)), "html", null, true);
        echo "
    </div>
    <div id=\"layer_menu_sizer\">
        <div class=\"floatleft\">
            <img class=\"icon\"
                data-right=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/resizeright.png"], "method"), "html", null, true);
        echo "\"
                src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/resize.png"], "method"), "html", null, true);
        echo "\"/>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "database/designer/table_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 61,  160 => 60,  150 => 55,  147 => 54,  143 => 51,  133 => 47,  129 => 46,  124 => 43,  121 => 42,  119 => 41,  118 => 40,  117 => 39,  113 => 38,  107 => 35,  103 => 34,  96 => 30,  91 => 28,  84 => 24,  81 => 23,  77 => 22,  69 => 17,  65 => 16,  61 => 15,  57 => 14,  49 => 9,  45 => 8,  41 => 7,  35 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "database/designer/table_list.twig", "/var/www/html/phpMyAdmin/templates/database/designer/table_list.twig");
    }
}
