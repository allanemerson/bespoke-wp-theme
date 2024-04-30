wp.domReady(() => {
	// find blocks styles
	// wp.blocks.getBlockTypes().forEach((block) => {
	// 	if (_.isArray(block["styles"])) {
	// 		console.log(block.name, _.pluck(block["styles"], "name"));
	// 	}
	// });
	// wp.blocks.unregisterBlockStyle("core/button", "fill");
	wp.blocks.unregisterBlockStyle("core/button", "outline");
	wp.blocks.unregisterBlockStyle("core/image", "rounded");
	wp.blocks.unregisterBlockStyle("core/separator", "dots");
	wp.blocks.registerBlockStyle("core/pullquote", {
		name: "small",
		label: "Small",
	});
	wp.blocks.registerBlockStyle("core/button", {
		name: "secondary",
		label: "Secondary",
	});
	wp.blocks.registerBlockStyle("core/heading", {
		name: "accent",
		label: "Accent",
	});
	wp.blocks.registerBlockStyle("core/heading", {
		name: "accent-full",
		label: "Accent Full",
	});
	wp.blocks.registerBlockStyle("core/heading", {
		name: "accent-below",
		label: "Accent Below",
	});
	wp.blocks.registerBlockStyle("core/heading", {
		name: "block-heading",
		label: "Block Heading",
	});
	wp.blocks.registerBlockStyle("core/image", {
		name: "badge",
		label: "Badge Caption",
	});
	wp.blocks.registerBlockStyle("core/group", {
		name: "global-bg",
		label: "ROC Background",
	});
	wp.blocks.registerBlockStyle("core/list", {
		name: "icon",
		label: "Icons",
	});
});
