{% extends "layouts/layout.volt" %}
{% block content %}

    {{ form('posts/save') }}
    <div class="form-group">
        <label for="formGroupExampleInput">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Content</label>
        <textarea type="text" class="form-control" rows="4" name="content" placeholder="Content"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    </form>
{% endblock %}
