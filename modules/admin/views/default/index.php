<div class="admin-default-index container">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is content action "<?= $this->context->action->id ?>".
        the action controller  "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.

    </p>
    <p>
        <code><?= __FILE__ ?></code>
    </p>
</div>