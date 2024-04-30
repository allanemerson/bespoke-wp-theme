import { RichText, URLInputButton } from "@wordpress/block-editor";
export function Button({ link, onUpdate, btnClass }) {
	return (
		<>
			{link.url ? (
				<div className={"btn " + btnClass}>
					<RichText
						allowedFormats={[]}
						value={link.text}
						onChange={(text) =>
							onUpdate({
								url: link.url,
								text: text,
							})
						}
						placeholder="Link Text..."
					/>
				</div>
			) : null}
			<URLInputButton
				url={link.url}
				onChange={(url, post) =>
					onUpdate({
						url: url,
						text: link.text,
					})
				}
			/>
		</>
	);
}
