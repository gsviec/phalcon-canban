{% extends "layouts/layout.volt" %}
{% block content %}

    {{ form('users/save') }}
    {% if post is defined %}
        {{ form.render('id') }}
    {% endif %}
    <div class="form-group">
        <label for="formGroupExampleInput">Full Name</label>
        {{ form.render('name') }}
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Email</label>
        {{ form.render('email') }}
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Password</label>
        {{ form.render('password') }}
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Confirm Password</label>
        {{ form.render('password_confirm') }}
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    </form>
{% endblock %}
