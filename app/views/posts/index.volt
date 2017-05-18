{% extends "layouts/layout.volt" %}
{% block content %}

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Content</th>
            <th>User ID</th>
            <th>Created</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td><a href="/posts/edit">Link</a></td>
        </tr>
        </tbody>
    </table>
{% endblock %}
