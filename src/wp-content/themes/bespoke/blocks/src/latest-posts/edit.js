import { useBlockProps, RichText, InspectorControls } from "@wordpress/block-editor";
import { BlockAnchor } from "../../components/BlockAnchor";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	return (
		<div {...useBlockProps()}>
			<InspectorControls>					
				<BlockAnchor
					currentValue={attributes.anchor}
					onUpdate={(newValue) => {
						setAttributes({
							anchor: newValue,
						});
					}}
				/>
			</InspectorControls>
			<div className="container">
				<RichText
					tagName="h2"
					allowedFormats={[]}
					value={attributes.heading}
					onChange={(heading) => setAttributes({ heading })}
				/>
				<div className="admin-message">
					This block is populated automatically
				</div>
			</div>
		</div>
	);
}
