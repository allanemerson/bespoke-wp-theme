import {
	useBlockProps,
	useInnerBlocksProps,
	InnerBlocks,
	InspectorControls,
} from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";
import { PanelBody, SelectControl } from "@wordpress/components";

import "./editor.scss";
import { BlockAnchor } from "../../components/BlockAnchor";

export default function Edit({ attributes, setAttributes, clientId }) {
	const innerBlockData = useSelect(
		(select) => select("core/block-editor").getBlock(clientId).innerBlocks
	);

	const columns = innerBlockData.length < 6 ? innerBlockData.length : 5;

	const { children, innerBlocksProps } = useInnerBlocksProps(
		{},
		{
			orientation: "horizontal",
			allowedBlocks: ["bespoke/column"],
			template: [
				["bespoke/column", {}],
				["bespoke/column", {}],
			],
			renderAppender: () => <InnerBlocks.ButtonBlockAppender />,
		}
	);
	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody title="Block Options">
				<SelectControl
					label="Mobile Layout"
					value={attributes.mobile_layout}
					onChange={(value) => {
						setAttributes({ mobile_layout: value });
					}}
					options={[
						{
							label: "Stacked",
							value: "stacked",
						},
						{
							label: "No Change",
							value: "no-change",
						}
					]}
				/>
				</PanelBody>
				<BlockAnchor
					currentValue={attributes.anchor}
					onUpdate={(newValue) => {
						setAttributes({
							anchor: newValue,
						});
					}}
				/>
			</InspectorControls>
			<div {...innerBlocksProps}>
				<div
					className="container"
					style={{ "--column-count": columns }}
				>
					<div className="grid">{children}</div>
				</div>
			</div>
		</div>
	);
}
