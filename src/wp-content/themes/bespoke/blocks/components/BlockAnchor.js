import { PanelBody, TextControl } from "@wordpress/components";
export function BlockAnchor({ currentValue, onUpdate }) {
	return (
		<PanelBody title="Block Attributes" initialOpen={false}>
			<TextControl
				label="HTML Anchor"
				help="Enter a word or two — without spaces — to make a unique web address just for this block, called an “anchor.” Then, you’ll be able to link directly to this section of your page."
				value={currentValue}
				onChange={(newValue) => {
					onUpdate(newValue);
				}}
			/>
		</PanelBody>
	);
}
