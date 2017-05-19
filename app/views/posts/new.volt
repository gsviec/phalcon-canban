{% extends "layouts/layout.volt" %}
{% block content %}

    {{ form('posts/save') }}
    {% if post is defined %}
        {{ form.render('id') }}
    {% endif %}
    <div class="form-group">
        <label for="formGroupExampleInput">Title</label>
        {{ form.render('title') }}
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Content</label>
        {{ form.render('content') }}
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    </form>
{% endblock %}
