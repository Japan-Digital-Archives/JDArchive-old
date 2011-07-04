<table>

<? foreach ($this->testimonials as $t) { ?>
    <tr>
        <td>
            <a href="/testimonial/browse/<?= $t->getId() ?>"><?= $t->getId() ?></a>
        </td>
    <tr><?
} ?>
</table>