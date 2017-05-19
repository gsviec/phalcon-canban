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
            <th>Deleted</th>
        </tr>
        </thead>
        <tbody>
        {% for post in posts %}
        <tr>
            <th scope="row">1</th>
            <td>{{ post.title }}</td>
            <td>{{ substr(post.content, 0, 20) }}</td>
            <td>{{ post.userId }}</td>
            <td>{{ date('Y-m-d', post.created) }}</td>
            <td><a href="/posts/edit/{{ post.id }}">Edit</a></td>
            <td><a href="/posts/deleted/{{ post.id }}">Delete</a></td>
        </tr>
        {% endfor %}
        </tbody>
    </table>
{% endblock %}
