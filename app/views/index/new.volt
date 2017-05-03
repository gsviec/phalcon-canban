{% extends "layouts/layout.volt" %}

{% block content %}
    {#{{ form('products/save', 'method': 'post') }}#}
    <form action="/products/save" method="post">
    <label for="name">Name</label>
    {{ text_field("name", "size": 32) }}

    <label for="type">Type</label>
    {{ select("type", productTypes, 'using': ['id', 'name']) }}

    {{ submit_button('Send') }}

    {{ end_form() }}
{% endblock %}


{% block scripts %}
    <script>
        console.log('1');
    </script>
{% endblock %}