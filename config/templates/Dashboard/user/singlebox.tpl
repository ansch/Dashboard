<div id="box_{$box.id}" class="box" style="width:{$box.width}%">
	{if $allowEdit eq true}
		{if $box.plugin ne ''}
			<div class="box_edit_button" onclick="javascript:$('box_edit_{$box.id}').removeClassName('box_hidden');$('box_content_{$box.id}').addClassName('box_hidden');return false;">
                                {img modname='core' src='xedit.png' set='icons/small' __alt="Edit Content" __title="Edit Content"}
			</div>
		{/if}
	{/if}
	<div class="box_title">
		{$box.title}
	</div>
	
	<div class="box_content" id="box_content_{$box.id}">
		{$box.output}
	</div>
	{if $allowEdit eq true}
	<div class="box_content box_hidden" id="box_edit_{$box.id}">
		<p>
			{gt text="Edit/Options"}:
		</p>
		<ul>
			{if $box.previous gt 0}
				<li>
                                        {img modname='core' src='1leftarrow.png' set='icons/small' __alt="move left" __title="move left"}                                    
				{if $admin}	
					<a href="{modurl modname="Dashboard" func="switchPosition" box1=$box.id box2=$box.previous userid=-1}">
				{else}				
					<a href="{modurl modname="Dashboard" func="switchPosition" box1=$box.id box2=$box.previous}">
				{/if}				
						{gt text="move left"}
					</a>
				</li>
			{/if}
			{if $box.next gt 0}
				<li>
				{if $admin}	
					<a href="{modurl modname="Dashboard" func="switchPosition" box1=$box.id box2=$box.next userid=-1}">
				{else}				
					<a href="{modurl modname="Dashboard" func="switchPosition" box1=$box.id box2=$box.next}">
				{/if}				
						{gt text="move right"}
					</a> 
                                        {img modname='core' src='1rightarrow.png' set='icons/small' __alt="move right" __title="move right"}
				</li>
			{/if}
		</ul>
		<ul>
			<li>
                                {img modname='core' src='agt_stop.png' set='icons/small' __alt="cancel editing" __title="cancel editing"}
				<a class="boxes_link" onclick="javascript:$('box_edit_{$box.id}').addClassName('box_hidden');$('box_content_{$box.id}').removeClassName('box_hidden');return false;" >
					{gt text="cancel editing"}
				</a>
			</li>
		{if $box.permanent ne true}
			<li>
                                {img modname='core' src='edittrash.png' set='icons/small' __alt="remove this box" __title="remove this box"}
			{if $admin}	
				<a href="{modurl modname="Dashboard" type=$type func="delete" box=$box.plugin id=$box.id ot="boxes" returnfunc=$func userid=-1}" onclick="return confirm('{gt text="Do you want to delete this box?"}');" >
			{else}				
				<a href="{modurl modname="Dashboard" type=$type func="delete" box=$box.plugin id=$box.id ot="boxes" returnfunc=$func}" onclick="return confirm('{gt text="Do you want to delete this box?"}');" >
			{/if}				
					{gt text="remove this box"}
				</a>
			</li>
		{/if}
		</ul>
	</div>
	{/if}
</div>
