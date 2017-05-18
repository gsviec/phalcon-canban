{% extends "layouts/layout.volt" %}

{% block content %}
{#{% if name is defined %}#}
    {#{{ name }}#}
{#{% else %}#}

    {#{{ 'Zend' }}#}
{#{% endif %}#}

{#{{ name is defined ? name : 'Zend' }}#}
<ul>
    {% for framework in frameworks %}
        <li>
            {{ framework }}
        </li>
    {% endfor %}
</ul>

{#{% include 'partials/footer.volt' %}#}



{% endblock %}