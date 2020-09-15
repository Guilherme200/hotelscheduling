<tr class="text-center">
  <th sortable @click="orderBy('user_id', $event)">
    @lang('labels.common.user')
  </th>
  <th sortable @click="orderBy('room_id', $event)">
    @lang('labels.common.room')
  </th>
  <th sortable @click="orderBy('creted_at', $event)">
    @lang('labels.common.reserved_at')
  </th>
</tr>