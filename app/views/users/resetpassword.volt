{% extends "layouts/layout.volt" %}
{% block content %}

    {{ form('users/resetpassword') }}

    <div class="form-group">
        <label for="formGroupExampleInput2">Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    </form>
{% endblock %}
