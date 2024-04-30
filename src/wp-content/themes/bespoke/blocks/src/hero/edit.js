import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "./editor.scss";
import { Image } from "../../components/Image";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const INNERBLOCKS_ALLOWED = [
		"core/paragraph",
		"core/heading",
		"core/list",
		"core/list-item",
		"core/buttons",
	];
	const INNERBLOCKS_TEMPLATE = [
		[
			"core/heading",
			{
				placeholder: "Headline...",
				level: 1
			},
		],
		["core/paragraph", { placeholder: "Text..." }],
		[
			"core/buttons",
			{},
			[["core/button", { placeholder: "Button text..." }]],
		],
	];
	return (
		<div {...useBlockProps()}>
			<Image
				image={attributes.main_image}
				label="Main Image"
				onUpdate={(image) => {
					setAttributes({
						main_image: {
							url: image.url,
							id: image.id,
						},
					});
				}}
			/>
			<div className="body">
				<InnerBlocks
					template={INNERBLOCKS_TEMPLATE}
					allowedBlocks={INNERBLOCKS_ALLOWED}
					/>
			</div>
		</div>
	);
}
