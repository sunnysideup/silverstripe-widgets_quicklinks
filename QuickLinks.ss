<% if Links %>
<ul class="QuickLinkEntries">
	<% loop Links %>
		<li><a class="$LinkOrSection $FirstLast" href="$Link"><span>$MenuTitle</span></a></li>
	<% end_loop %>
</ul>
<% end_if %>
