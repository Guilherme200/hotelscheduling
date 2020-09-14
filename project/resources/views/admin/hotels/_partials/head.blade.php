<tr>
  <th sortable @click="orderBy('name', $event)">
    @lang('labels.common.name')
  </th>
  <th sortable @click="orderBy('phone', $event)">
    @lang('labels.common.phone')
  </th>
  <th sortable @click="orderBy('city', $event)">
    @lang('labels.common.city')
  </th>
  <th sortable @click="orderBy('complement', $event)">
    @lang('labels.common.complement')
  </th>
  <th class="text-center">
    @lang('labels.common.actions')
  </th>
</tr>